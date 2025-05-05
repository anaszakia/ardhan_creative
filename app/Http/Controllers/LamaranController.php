<?php

namespace App\Http\Controllers;

use App\Models\Lamaran;
use App\Models\Karir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LamaranController extends Controller
{
    /**
     * Menampilkan halaman form lamaran dengan data lowongan yang dipilih
     */
    public function showForm($id = null)
    {
        $selectedPosition = null;
        
        if ($id) {
            $selectedPosition = Karir::find($id);
            if (!$selectedPosition) {
                return redirect()->route('karir')->with('error', 'Posisi yang dipilih tidak ditemukan.');
            }
        }
        
        // Ambil semua data lowongan untuk ditampilkan di halaman
        $lokerList = Karir::all();
        
        return view('karir', compact('lokerList', 'selectedPosition'));
    }
    
    /**
     * Proses penyimpanan data lamaran
     */
    public function store(Request $request)
    {
        // Debug: Log semua data request
        Log::info('Form data received:', $request->all());
        
        try {
            // Validasi input
            $validated = $request->validate([
                'fullname' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'location' => 'required|string|max:255',
                'position' => 'required|string|max:255',
                'experience' => 'required|numeric|min:0|max:20',
                'portfolio' => 'nullable|url|max:255',
                'cover-letter' => 'required|string|max:500',
                'resume' => 'required|file|mimes:pdf|max:5120', // 5MB max
            ]);
            
            Log::info('Validation passed');

            // Proses upload CV
            $cvPath = null;
            if ($request->hasFile('resume')) {
                try {
                    $cvPath = $request->file('resume')->store('cv', 'public');
                    Log::info('Resume file stored at: ' . $cvPath);
                } catch (\Exception $e) {
                    Log::error('File upload error: ' . $e->getMessage());
                    return redirect()->back()->with('error', 'Terjadi kesalahan saat mengunggah file CV: ' . $e->getMessage());
                }
            } else {
                Log::warning('No resume file detected');
            }

            // Simpan data ke database dengan DB transaction
            DB::beginTransaction();
            try {
                // Simpan data ke database menggunakan model Lamaran
                $lamaran = Lamaran::create([
                    'nama' => $validated['fullname'],
                    'email' => $validated['email'],
                    'no_telepon' => $validated['phone'],
                    'domisili' => $validated['location'],
                    'link_porto' => $validated['portfolio'] ?? null,
                    'surat_lamaran' => $validated['cover-letter'],
                    'cv' => $cvPath,
                    'posisi' => $validated['position'],
                    'pengalaman' => $validated['experience']
                ]);
                
                DB::commit();
                Log::info('Data saved successfully with ID: ' . $lamaran->id);
                
                // Redirect dengan pesan sukses
                return redirect()->route('karir')
                    ->with('success', 'Lamaran Anda untuk posisi ' . $validated['position'] . ' berhasil dikirim! (ID: ' . $lamaran->id . ')');
            } catch (\Exception $e) {
                DB::rollBack();
                Log::error('Database error: ' . $e->getMessage());
                Log::error('Error trace: ' . $e->getTraceAsString());
                return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
            }
        } catch (\Exception $e) {
            Log::error('General error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}