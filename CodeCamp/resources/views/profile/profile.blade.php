@extends('layouts.app')

<script src="https://unpkg.com/html5-qrcode"></script>

@section('content')
<div class="container mx-auto py-16 px-4">
    <div class="max-w-2xl mx-auto bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
        <div class="bg-orange-400 h-32"></div>
        <div class="px-8 pb-8">
            <div class="relative">
                <div class="absolute -top-16 left-0 w-32 h-32 bg-white rounded-full p-2 shadow-lg">
                    <div class="w-full h-full bg-orange-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-orange-400 text-5xl"></i>
                    </div>
                </div>
            </div>
            
            <div class="mt-20">
                <h1 class="text-3xl font-bold text-gray-800">{{ auth()->user()->UserName }}</h1>
                <p class="text-gray-500">{{ auth()->user()->Email ?? 'No email provided' }}</p>
                
                <div class="mt-8 grid grid-cols-1 gap-4">
                    <div class="p-4 bg-gray-50 rounded-xl border border-gray-100">
                        <p class="text-xs font-bold text-orange-500 uppercase tracking-wider">Account Type</p>
                        <p class="text-gray-700 font-medium">Standard Member</p>
                    </div>

                    <div class="p-4 bg-orange-50 rounded-xl border border-orange-100 mt-4">
                        <h4 class="text-sm font-bold text-orange-600 mb-2">Login to another device</h4>
                        <p class="text-xs text-gray-600 mb-4">Scan the QR code displayed on your PC/Tablet to sign in instantly.</p>
                        
                        <button id="openScannerBtn" class="w-full bg-orange-500 text-white font-bold py-3 rounded-xl hover:bg-orange-600 transition-all flex items-center justify-center gap-2">
                            <i class="fas fa-camera"></i> Scan QR Code
                        </button>

                        <div id="scannerContainer" class="hidden mt-4">
                            <div id="reader" class="overflow-hidden rounded-xl border-2 border-orange-400 bg-black"></div>
                            <button id="closeScannerBtn" class="mt-3 w-full py-2 text-sm font-semibold text-gray-500 hover:text-orange-600">
                                Close Camera
                            </button>
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex gap-3">
                    <a href="{{ url('/') }}" class="bg-gray-200 text-gray-700 px-6 py-2 rounded-xl font-bold hover:bg-gray-300 transition-all no-underline!">
                        Back to Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
let html5QrCode = null;

document.getElementById('openScannerBtn').addEventListener('click', function() {
    const container = document.getElementById('scannerContainer');
    const openBtn = document.getElementById('openScannerBtn');
    
    container.classList.remove('hidden');
    openBtn.classList.add('hidden');

    html5QrCode = new Html5Qrcode("reader");
    
    const config = { fps: 10, qrbox: { width: 250, height: 250 } };

    // Start scanning with the back camera
    html5QrCode.start({ facingMode: "environment" }, config, (decodedText) => {
        // Stop camera immediately upon success
        stopScanner();
        
        // redirect to the URL contained in the QR code 
        // (which is your /qr-login/{token} route)
        window.location.href = decodedText;
    }).catch(err => {
        console.error("Camera error:", err);
        alert("Could not access camera. Please check permissions.");
        stopScanner();
    });
});

document.getElementById('closeScannerBtn').addEventListener('click', stopScanner);

function stopScanner() {
    if (html5QrCode) {
        html5QrCode.stop().then(() => {
            document.getElementById('scannerContainer').classList.add('hidden');
            document.getElementById('openScannerBtn').classList.remove('hidden');
        }).catch(err => console.error("Stop failed", err));
    }
}
</script>
@endsection