<div x-data="modal">
    <!-- button -->
    <button type="button" class="btn btn-primary" @click="toggle">
        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
            <path fill="#ffff"
                d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM504 312V248H440c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V136c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H552v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
        </svg>
    </button>

    <!-- modal -->
    <div class="fixed inset-0 bg-[black]/60 z-[999]  hidden" :class="open && '!block'">
        <div class="flex items-start justify-center min-h-screen px-4" @click.self="open = false">
            <div x-show="open" x-transition x-transition.duration.300
                class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-5xl my-8">
                <div class="p-5">
                    <h1 class="text-xl font-semibold mb-4">Add Dosen</h1>
                    <form class="space-y-5" method="POST" action="{{ route('dosen.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="nama">Nama</label>
                            <input id="nama" type="text" placeholder="Nama dosen" class="form-input" name="name" required />
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="email">Email</label>
                                <input id="email" type="email" placeholder="Enter Email" class="form-input" name="email" />
                            </div>
                            <div>
                                <label for="password">Password</label>
                                <input id="password" type="Password" placeholder="Enter Password" class="form-input" name="password" />
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="address">Alamat</label>
                                <input id="address" type="text" placeholder="alamat" class="form-input" name="address"/>
                            </div>
                            <div>
                                <label for="phone">Nomor HP</label>
                                <input id="phone" type="text" placeholder="nomor HP" class="form-input" name="phone" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="role">Role</label>
                                <select id="role" class="form-select text-white-dark" name="role">
                                    <option value="Dosen">Dosen</option>
                                </select>
                            </div>
                            <div>
                                <label for="gender">Jenis Kelamin</label>
                                <select id="gender" class="form-select text-white-dark" name="gender">
                                    <option value="Pria">Pria</option>
                                    <option value="">Wanita</option>
                                </select>
                            </div>

                            <div>
                                <label for="avatar">Avatar</label>
                                <input id="avatar" type="file" name="avatar" class="form-input file:py-2 file:px-4 file:border-0 file:font-semibold p-0 file:bg-primary/90 ltr:file:mr-5 rtl:file:ml-5 file:text-white file:hover:bg-primary" required />
                            </div>
                        </div>
                        <div class="flex justify-end items-center mt-8">
                            <button type="button" class="btn btn-outline-danger" @click="toggle">Discard</button>
                            <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4" @click="toggle">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
