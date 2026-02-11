<div id="registerSection" class="hidden">
                <h3 class="text-center text-3xl font-extrabold text-orange-400 mb-8!">Join Us</h3>
                <form id="modalRegistrationForm" action="{{ route('register') }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="space-y-4!">
                        <input type="text" name="userName" class="w-full p-3 text-orange-600! font-semibold! border-2 border-orange-200 rounded-xl outline-none focus:border-orange-500 transition-colors" placeholder="Username" required/>
                        <input type="email" name="email" class="w-full p-3 text-orange-600! font-semibold! border-2 border-orange-200 rounded-xl outline-none focus:border-orange-500 transition-colors" placeholder="Email Address" required/>
                        <input type="tel" name="phoneNo" class="w-full p-3 text-orange-600! font-semibold! border-2 border-orange-200 rounded-xl outline-none focus:border-orange-500 transition-colors" placeholder="Phone Number" required/>
                        
                        <div>
                            <label class="text-xs font-bold text-orange-400 uppercase tracking-wider ml-1">Birth Date</label>
                            <input type="date" name="dateOfBirth" class="w-full p-3 text-orange-600! font-semibold! border-2 border-orange-200 rounded-xl outline-none focus:border-orange-500 transition-colors" required/>
                        </div>

                        <div class="flex gap-6 px-1">
                            <label class="flex! items-center! cursor-pointer font-medium text-orange-600">
                                <input type="radio" name="gender" value="male" checked class="mr-2! w-4 h-4 text-orange-500 focus:ring-orange-500"> Male
                            </label>
                            <label class="flex! items-center! cursor-pointer font-medium text-orange-600">
                                <input type="radio" name="gender" value="female" class="mr-2! w-4 h-4 text-orange-500 focus:ring-orange-500"> Female
                            </label>
                        </div>

                        <input type="password" name="password" class="w-full p-3 text-orange-600! font-semibold! border-2 border-orange-200 rounded-xl outline-none focus:border-orange-500 transition-colors" placeholder="Password" required/>
                    </div>

                    <label class="flex! items-center! text-xs text-orange-500 cursor-pointer pt-1! pb-1!">
                        <input type="checkbox" id="terms" required class="mr-2! rounded border-orange-300 text-orange-600 focus:ring-orange-500">
                        <span>By registering, I agree to the <a href="#" class="text-orange-700! underline">Terms of Service</a> and Privacy Policy.</span>
                    </label>

                    <button type="submit" class="w-full bg-gradient-to-r from-orange-400/80 via-orange-500/90 to-orange-400/80
 hover:bg-orange-700 text-white font-bold py-4 rounded-xl! transition-all shadow-sm shadow-orange-500/30 active:scale-[0.98]">
                        CREATE ACCOUNT
                    </button>
                </form>

                <p class="text-center mt-4! text-orange-500 text-sm">
                    Already registered? <button class="text-orange-600 font-bold hover:underline" id="showLoginLink">Log in</button>
                </p>
            </div>