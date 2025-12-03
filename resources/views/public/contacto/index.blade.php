@extends('layouts.public')

@section('title', 'Contacto - PROMUBE')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Contacto</h1>

    <div class="grid md:grid-cols-2 gap-6">
        <div>
            <p class="text-gray-700 text-sm mb-4">
                Si deseas más información sobre las becas y programas difundidos por PROMUBE,
                puedes comunicarte a través de los siguientes canales:
            </p>

            <ul class="text-sm text-gray-800 space-y-2">
                <li><span class="font-semibold">Correo corporativo:</span> info@promube.pe</li>
                <li><span class="font-semibold">WhatsApp:</span> +51 999 999 999</li>
                <li><span class="font-semibold">Facebook:</span> <a href="#" class="text-blue-600 hover:underline">/promube</a></li>
                <li><span class="font-semibold">TikTok:</span> <a href="#" class="text-blue-600 hover:underline">@promube</a></li>
            </ul>
        </div>

        <div>
            {{-- Si en el futuro quieres un formulario real, aquí va --}}
            <div class="bg-white rounded-lg shadow-sm p-4 text-sm">
                <p class="font-semibold mb-2">Formulario de contacto (maquetado)</p>
                <p class="text-gray-500 text-xs mb-3">
                    (Por ahora es solo visual. Más adelante se puede conectar a email o base de datos.)
                </p>

                <form>
                    <div class="mb-3">
                        <label class="block text-xs font-semibold mb-1">Nombre completo</label>
                        <input type="text" class="w-full border rounded px-2 py-1 text-sm">
                    </div>
                    <div class="mb-3">
                        <label class="block text-xs font-semibold mb-1">Correo electrónico</label>
                        <input type="email" class="w-full border rounded px-2 py-1 text-sm">
                    </div>
                    <div class="mb-3">
                        <label class="block text-xs font-semibold mb-1">Mensaje</label>
                        <textarea class="w-full border rounded px-2 py-1 text-sm" rows="4"></textarea>
                    </div>
                    <button type="button"
                            class="bg-blue-600 text-white text-xs px-3 py-1.5 rounded hover:bg-blue-700">
                        Enviar (maquetado)
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
