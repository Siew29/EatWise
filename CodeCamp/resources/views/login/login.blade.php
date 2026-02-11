<div id="loginSection" class="block">
                <h3 class="text-center text-3xl font-semibold! text-orange-400 mb-8!">Welcome Back</h3>

                @if ($errors->has('loginError'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-4 text-sm flex items-center shadow-sm">
                        <i class="fa-solid fa-circle-exclamation mr-2"></i>
                        <span>{{ $errors->first('loginError') }}</span>
                    </div>
                @endif
                
                <div class="flex p-1 bg-gray-100 rounded-full! mb-8 border-2 border-orange-300">
                    <button type="button" id="traditionalTab" onclick="switchLoginMethod('traditional')" class="flex-1 py-2 px-4 rounded-full! font-semibold! text-sm transition-all active-tab-blue">
                        Username
                    </button>
                    <button type="button" id="qrTab" onclick="switchLoginMethod('qr')" class="flex-1 py-2 px-4 rounded-full! font-bold text-sm transition-all text-gray-500 active:text-white!">
                        QR Code
                    </button>
                </div>

                <form id="modalLoginForm" action="{{ route('login') }}" method="POST" class="space-y-5">
                    @csrf
                    <div id="traditionalFields" class="space-y-4">
                        <div class="group">
                            @if ($errors->has('userName'))
                                <div class="text-red-500 text-xs italic mb-4">
                                    {{ $errors->first('userName') }}
                                </div>
                            @endif
                            <div class="flex items-center border-2 border-orange-200 rounded-xl overflow-hidden focus-within:border-orange-500 transition-colors">
                                <span class="px-4 text-orange-400 group-focus-within:text-orange-500"><i class="fa-solid fa-user"></i></span>
                                <input type="text" name="userName" class="w-full py-3 pr-4 outline-none text-orange-700" placeholder="Username" required/>
                            </div>
                        </div>
                        <div class="group">
                            <div class="relative flex items-center border-2 border-orange-200 rounded-xl overflow-hidden focus-within:border-orange-500 transition-colors">
                                <span class="px-4 text-orange-400 group-focus-within:text-orange-500"><i class="fa-solid fa-lock"></i></span>
                                <input type="password" name="password" id="loginPassword" 
                                    class="w-full py-3 pr-12 outline-none text-orange-700 bg-transparent" 
                                    placeholder="Password" required/>
                                
                                <button type="button" onclick="togglePassword('loginPassword', 'loginIcon')" 
                                        class="absolute right-0 top-0 h-full px-4 text-orange-400 hover:text-orange-600 focus:outline-none z-10">
                                    <i id="loginIcon" class="fa-solid fa-eye-slash"></i>
                                </button>
                            </div>
                        </div>
                        <div class="flex justify-between! items-center! text-sm font-medium">
                            <label class="flex! items-center! cursor-pointer text-gray-600">
                                <input type="checkbox" name="rememberMe" class="mr-2! rounded border-gray-300 text-orange-600! focus:ring-white">
                                <span class="text-orange-600!">Keep me logged in</span>
                            </label>
                            <a href="{{ route('password.request') }}" class="text-orange-600! hover:underline">Forgot Password?</a>
                        </div>
                    </div>

                    <div id="qrFields" class="hidden text-center py-2">
                        <div class="inline-block p-4 bg-white border-2 border-dashed border-orange-200 rounded-2xl shadow-inner">
                            <img id="qrLoginImage" src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=example" alt="QR Code" class="w-48 h-48">
                        </div>
                        <button type="button" class="block mx-auto mt-4 text-orange-600 text-sm font-bold hover:underline">Refresh QR Code</button>
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-orange-400/80 via-orange-500/90 to-orange-400/80
 hover:bg-orange-700 text-white font-bold py-4 rounded-xl! transition-all shadow-sm shadow-orange-500/30 active:scale-[0.98]">
                        SIGN IN
                    </button>
                </form>

                <p class="text-center mt-8! text-orange-500 text-sm">
                    New here? <button class="text-orange-600 font-bold hover:underline" id="showRegisterLink">Create an account</button>
                </p>
            </div>


<script>
document.addEventListener('DOMContentLoaded', function() {
    @if ($errors->any())
        const authModal = document.getElementById('authModal');
        if (authModal) {
            authModal.classList.remove('hidden');
            authModal.classList.add('flex');
            document.body.style.overflow = 'hidden';
            
            @if ($errors->has('loginError'))
                document.getElementById('loginSection').classList.remove('hidden');
                document.getElementById('registerSection').classList.add('hidden');
            @endif
        }
    @endif
});

function togglePassword(inputId, iconId) {
    const passwordInput = document.getElementById(inputId);
    const icon = document.getElementById(iconId);

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    } else {
        passwordInput.type = 'password';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    }
}
 </script>