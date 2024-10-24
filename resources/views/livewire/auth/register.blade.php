<div class="flex justify-center items-center mt-5">
    <div class="w-full max-w-md">
        <div class="bg-[#1E1E2C] p-6 rounded-lg shadow-lg">
            <form class="flex flex-col gap-6" wire:submit.prevent="register">
                <div>
                    <div class="text-[28px]">Registrar</div>
                    <div class="text-[16px] text-[#C3C3D1]">Insira os dados para fazer o cadastro.</div>
                    @error('error') <span class="text-red-500">{{ $message }}</span> @enderror
                    @if ($successMessage)
                        <span class="text-green-500">{{ $successMessage }}</span>
                    @endif
                </div>
                <div class="flex flex-col gap-4">
                    <label class="text-[14px] text-[#C3C3D1]">E-mail</label>
                    <input
                        type="email"
                        class="w-full bg-[#19192d] text-white p-2 focus:outline-none focus:ring-0 border border-[#1E1E2C]"
                        placeholder="Insira seu e-mail"
                        wire:model="email"
                    />
                    @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="flex flex-col gap-4">
                    <label class="text-[14px] text-[#C3C3D1]">Nome</label>
                    <input
                        type="text"
                        class="w-full bg-[#19192d] text-white p-2 focus:outline-none focus:ring-0 border border-[#1E1E2C]"
                        placeholder="Insira seu Nome"
                        wire:model="name"
                    />
                    @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="flex flex-col gap-4">
                    <label class="text-[14px] text-[#C3C3D1]">Senha</label>
                    <input
                        type="password"
                        class="w-full bg-[#19192d] text-white p-2 focus:outline-none focus:ring-0 border border-[#1E1E2C]"
                        placeholder="Insira sua senha"
                        wire:model="password"
                    />
                    @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="flex flex-col gap-4">
                    <label class="text-[14px] text-[#C3C3D1]">Confirme a senha</label>
                    <input
                        type="password"
                        class="w-full bg-[#19192d] text-white p-2 focus:outline-none focus:ring-0 border border-[#1E1E2C]"
                        placeholder="Insira sua senha"
                        wire:model="confirm_password"
                    />
                    @error('confirm_password') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <button class="bg-[#5354FD] text-white font-bold tracking-wide uppercase px-8 py-3 rounded-[4px] hover:bg-[#1f20a6] transition duration-300 ease-in-out w-full">
                    Cadastrar
                </button>
                <div class="flex justify-center mt-4">
                    <a href="{{ route('auth.login') }}" class="text-[#C3C3D1] underline">Já tenho uma conta</a>
                </div>
            </form>
        </div>
    </div>
</div>
