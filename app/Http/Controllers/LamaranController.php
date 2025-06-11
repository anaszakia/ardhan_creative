<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lamaran;

class LamaranController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_telepon' => 'required|string|max:20',
            'domisili' => 'required|string|max:255',
            'pengalaman' => 'required|string',
            'link_porto' => 'nullable|url|max:255',
            'surat_lamaran' => 'required|string|max:1000',
            'cv' => 'required|file|mimes:pdf|max:5120',
            'posisi' => 'required|string|max:255'
        ]);

        $cvPath = null;
        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('cv', 'public');
        }

        Lamaran::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
            'domisili' => $request->domisili,
            'pengalaman' => $request->pengalaman,
            'link_porto' => $request->link_porto,
            'surat_lamaran' => $request->surat_lamaran,
            'cv' => $cvPath,
            'posisi' => $request->posisi
        ]);

        return redirect()->back()->with('success', 'Lamaran berhasil dikirim!');
    }
}