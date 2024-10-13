<div class="flex justify-center items-center mt-5">
    <div class="w-full max-w-md">
        <div class="bg-[#1E1E2C] p-6 rounded-lg shadow-lg" x-data="{ isLogin: true }">
            <form class="flex flex-col gap-6" x-show="isLogin">
                <div>
                    <div class="text-[28px]">Login</div>
                    <div class="text-[16px] text-[#C3C3D1]">Insira suas credenciais para acessar sua conta.</div>
                </div>
                <div class="flex flex-col gap-4">
                    <label class="text-[14px] text-[#C3C3D1]">E-mail</label>
                    <input type="email" class="w-full bg-[#1E1E2C] text-white p-2 focus:outline-none focus:ring-0 border border-[#1E1E2C]" placeholder="Insira seu e-mail" />
                </div>
                <div class="flex flex-col gap-4">
                    <label class="text-[14px] text-[#C3C3D1]">Senha</label>
                    <input type="password" class="w-full bg-[#1E1E2C] text-white p-2 focus:outline-none focus:ring-0 border border-[#1E1E2C]" placeholder="Insira sua senha" />
                </div>
                <button class="bg-[#5354FD] text-white font-bold tracking-wide uppercase px-8 py-3 rounded-[4px] hover:bg-[#1f20a6] transition duration-300 ease-in-out w-full">
                    Login
                </button>
                <div class="flex justify-center mt-4">
                    <a href="{{route('auth.register')}}" class="text-[#C3C3D1] underline">Registrar</a>
                </div>
            </form>
        </div>
    </div>
</div>
