<x-app-layout>
    <div class="py-12 md:py-16 bg-[#faf8f5] min-h-[85vh]">
        <div class="max-w-5xl w-full mx-auto px-4 sm:px-6">
            <div class="mb-8 text-center">
                <span class="text-[10px] uppercase tracking-[0.3em] text-rose-700 font-bold block mb-2">Secure Reservation</span>
                <h2 class="text-3xl md:text-5xl font-serif italic text-stone-900">Reservasi Jadwal MUA</h2>
                <p class="mt-3 text-sm text-stone-500 font-serif italic">Isi detail acara sekali, lalu dapatkan invoice dan instruksi pembayaran yang jelas.</p>
            </div>

            <div class="mb-8 grid grid-cols-1 gap-3 sm:grid-cols-3">
                <div class="rounded-2xl border border-rose-200 bg-white p-4 text-center">
                    <span class="text-[9px] font-bold uppercase tracking-widest text-rose-700">01</span>
                    <p class="mt-1 text-xs font-semibold text-stone-800">Detail acara</p>
                </div>
                <div class="rounded-2xl border border-stone-200 bg-white p-4 text-center">
                    <span class="text-[9px] font-bold uppercase tracking-widest text-stone-400">02</span>
                    <p class="mt-1 text-xs font-semibold text-stone-800">Pilih pembayaran</p>
                </div>
                <div class="rounded-2xl border border-stone-200 bg-white p-4 text-center">
                    <span class="text-[9px] font-bold uppercase tracking-widest text-stone-400">03</span>
                    <p class="mt-1 text-xs font-semibold text-stone-800">Konfirmasi WhatsApp</p>
                </div>
            </div>

            <div class="bg-white p-6 sm:p-10 md:p-14 rounded-[2.5rem] shadow-[0_15px_40px_rgba(0,0,0,0.03)] border border-stone-200/80">

                <form id="bookingForm" class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8 text-left" novalidate>
                    @csrf

                    {{-- Nama & WhatsApp --}}
                    <div class="border-b border-stone-200 pb-2">
                        <label class="text-[9px] uppercase tracking-[0.2em] text-rose-700 font-bold block mb-1">Nama Lengkap</label>
                        <input type="text" id="name" value="{{ Auth::user()->name }}" readonly class="w-full border-none p-0 focus:ring-0 text-stone-800 bg-transparent font-medium">
                    </div>

                    <div class="border-b border-stone-200 pb-2">
                        <label class="text-[9px] uppercase tracking-[0.2em] text-stone-400 font-bold block mb-1">Nomor WhatsApp Pelanggan</label>
                        <input type="tel" id="whatsapp" placeholder="08..." required class="w-full border-none p-0 focus:ring-0 text-stone-700 bg-transparent">
                    </div>

                    {{-- Layanan & Tanggal --}}
                    <div class="border-b border-stone-200 pb-2">
                        <label class="text-[9px] uppercase tracking-[0.2em] text-stone-400 font-bold block mb-1">Pilih Layanan</label>
                        <select id="service" required class="w-full border-none p-0 focus:ring-0 text-stone-700 bg-transparent cursor-pointer">
                            <option value="" disabled selected>Memuat layanan...</option>
                        </select>
                    </div>

                    <div class="border-b border-stone-200 pb-2">
                        <label class="text-[9px] uppercase tracking-[0.2em] text-stone-400 font-bold block mb-1">Tanggal Acara</label>
                        <input type="date" id="date" min="{{ now()->format('Y-m-d') }}" required class="w-full border-none p-0 focus:ring-0 text-stone-500 bg-transparent">
                    </div>

                    {{-- Lokasi Sumatera Barat --}}
                    <div class="border-b border-stone-200 pb-2">
                        <label class="text-[9px] uppercase tracking-[0.2em] text-stone-400 font-bold block mb-1">Kabupaten / Kota</label>
                        <select id="regency" required class="w-full border-none p-0 focus:ring-0 text-stone-700 bg-transparent" onchange="updateDistricts()">
                            <option value="" disabled selected>Pilih Kabupaten/Kota</option>
                            <option value="Padang">Padang</option>
                            <option value="Padang Pariaman">Padang Pariaman</option>
                            <option value="Pariaman">Pariaman</option>
                            <option value="Agam">Agam</option>
                            <option value="Pasaman">Pasaman</option>
                            <option value="Pasaman Barat">Pasaman Barat</option>
                            <option value="Bukittinggi">Bukittinggi</option>
                        </select>
                    </div>

                    <div class="border-b border-stone-200 pb-2">
                        <label class="text-[9px] uppercase tracking-[0.2em] text-stone-400 font-bold block mb-1">Detail Kecamatan</label>
                        <select id="district" required class="w-full border-none p-0 focus:ring-0 text-stone-700 bg-transparent">
                            <option value="" disabled selected>Pilih Kecamatan</option>
                        </select>
                    </div>

                    {{-- Alamat Lengkap & Catatan --}}
                    <div class="md:col-span-2 border-b border-stone-200 pb-2">
                        <label class="text-[9px] uppercase tracking-[0.2em] text-stone-400 font-bold block mb-1">Alamat Lengkap & Catatan</label>
                        <textarea id="address" rows="2" placeholder="Nama jalan, nomor rumah, atau catatan tambahan..." required class="w-full border-none p-0 focus:ring-0 text-stone-700 bg-transparent resize-none"></textarea>
                    </div>

                    {{-- Metode Pembayaran --}}
                    <div class="md:col-span-2 border-b border-stone-200 pb-2">
                        <label class="text-[9px] uppercase tracking-[0.2em] text-stone-400 font-bold block mb-1">Metode Pembayaran Transfer</label>
                        <select id="payment_method" required class="w-full border-none p-0 focus:ring-0 text-stone-700 bg-transparent">
                            <option value="" disabled selected>Pilih Bank Transfer Tujuan</option>
                            @foreach($paymentSetting->paymentOptions() as $value => $label)
                                <option value="{{ $value }}">{{ $label }}</option>
                            @endforeach
                        </select>
                        @if($paymentSetting->payment_instructions)
                            <p class="mt-3 text-[11px] leading-relaxed text-stone-500">{{ $paymentSetting->payment_instructions }}</p>
                        @endif
                        @if($paymentSetting->qris_image_url)
                            <div class="mt-4 flex flex-wrap items-center gap-4 rounded-2xl bg-stone-50 p-4">
                                <img src="{{ $paymentSetting->qris_image_url }}" alt="QRIS pembayaran Glam By Ramdiah" class="h-28 w-28 rounded-xl object-contain bg-white p-2">
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-widest text-stone-900">Bayar dengan QRIS</p>
                                    <p class="mt-1 text-[11px] text-stone-500">Pilih QRIS di atas, lalu scan kode ini setelah booking dibuat.</p>
                                </div>
                            </div>
                        @endif
                    </div>

                        <button id="submitButton" type="submit" class="md:col-span-2 bg-stone-900 text-white py-4 rounded-full font-bold uppercase text-[10px] tracking-[0.25em] hover:bg-rose-700 transition-all shadow-md italic mt-4 disabled:cursor-not-allowed disabled:opacity-60">
                        Konfirmasi & Lanjutkan ke WhatsApp
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const locationData = {
            "Padang": ["Bungus Teluk Kabung", "Koto Tangah", "Kuranji", "Lubuk Begalung", "Lubuk Kilangan", "Nanggalo", "Padang Barat", "Padang Selatan", "Padang Timur", "Padang Utara", "Pauh"],
            "Padang Pariaman": ["2 x 11 Enam Lingkung", "2 x 11 Kayu Tanam", "IV Koto Aur Malintang", "V Koto Kampung Dalam", "V Koto Timur", "VII Koto Sungai Sarik", "Batang Anai", "Batang Gasan", "Enam Lingkung", "Lubuk Alung", "Nan Sabaris", "Padang Sago", "Patamuan", "Sintuk Toboh Gadang", "Sungai Geringging", "Sungai Limau", "Ulakan Tapakis"],
            "Pariaman": ["Pariaman Selatan", "Pariaman Tengah", "Pariaman Timur", "Pariaman Utara"],
            "Agam": ["Ampek Nagari", "Banuhampu", "Baso", "Canduang", "IV Koto", "Kamang Magek", "Lubuk Basung", "Malalak", "Matur", "Palembayan", "Palupuh", "Sungai Pua", "Tanjung Mutiara", "Tanjung Raya", "Tilatang Kamang", "Varik Ampek Angkek"],
            "Pasaman": ["Bonjol", "Dua Koto", "Lubuk Sikaping", "Mapat Tunggul", "Mapat Tunggul Selatan", "Padang Gelugur", "Panti", "Rao", "Rao Selatan", "Rao Utara", "Simpang Alahan Mati", "Tigo Nagari"],
            "Pasaman Barat": ["Gunung Tuleh", "Kinali", "Koto Balingka", "Lembah Melintang", "Luhak Nan Duo", "Pasaman", "Ranah Batahan", "Sasak Ranah Pasirie", "Sungai Aur", "Sungai Beremas", "Talamau"],
            "Bukittinggi": ["Aur Birugo Tigo Baleh", "Guguk Panjang", "Mandiangin Koto Selayan"]
        };

        function updateDistricts() {
            const regency = document.getElementById('regency').value;
            const districtSelect = document.getElementById('district');
            districtSelect.innerHTML = '<option value="" disabled selected>Pilih Kecamatan</option>';
            if(locationData[regency]) {
                locationData[regency].sort().forEach(dist => {
                    const opt = document.createElement('option');
                    opt.value = dist;
                    opt.textContent = dist;
                    districtSelect.appendChild(opt);
                });
            }
        }

        async function fetchServices() {
            try {
                const response = await fetch('/api/services');
                const services = await response.json();
                const select = document.getElementById('service');
                const urlParams = new URLSearchParams(window.location.search);
                const preselectedServiceId = urlParams.get('service_id');

                select.innerHTML = '<option value="" disabled ' + (!preselectedServiceId ? 'selected' : '') + '>Pilih Paket Makeup</option>';
                services.forEach(s => {
                    const isSelected = preselectedServiceId && String(s.id) === String(preselectedServiceId);
                    select.innerHTML += `<option value="${s.id}" ${isSelected ? 'selected' : ''}>${s.name} - Rp ${parseInt(s.price).toLocaleString('id-ID')}</option>`;
                });
            } catch (e) { console.error("Gagal memuat layanan"); }
        }

        document.getElementById('bookingForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            const submitButton = document.getElementById('submitButton');
            submitButton.disabled = true;
            submitButton.textContent = 'Menyimpan Reservasi...';
            const fullLocation = `${document.getElementById('regency').value}, ${document.getElementById('district').value}. ${document.getElementById('address').value}`;
            const formData = {
                service_id: document.getElementById('service').value,
                booking_date: document.getElementById('date').value,
                whatsapp: document.getElementById('whatsapp').value,
                location: fullLocation,
                address_details: document.getElementById('address').value,
                payment_method: document.getElementById('payment_method').value,
            };

            try {
                const response = await fetch("{{ route('user.booking.store') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(formData)
                });

                const result = await response.json();
                if (response.ok) {
                    // Fitur WhatsApp Otomatis
                    const waNumber = "{{ config('app.admin_whatsapp', '628123456789') }}";
                    const serviceName = document.getElementById('service').options[document.getElementById('service').selectedIndex].text;
                    const waMessage = `Halo Glam By Ramdiah, saya telah melakukan booking:%0A%0A` +
                                      `Nama: ${document.getElementById('name').value}%0A` +
                                      `Layanan: ${serviceName}%0A` +
                                      `Tanggal: ${formData.booking_date}%0A` +
                                      `Lokasi: ${fullLocation}%0A` +
                                      `Metode: Transfer ${formData.payment_method}%0A%0A` +
                                      `Mohon segera dikonfirmasi ya, terima kasih!`;

                    alert(`Reservasi ${result.invoice_number} berhasil dicatat! Anda akan diarahkan ke WhatsApp untuk konfirmasi pembayaran.`);
                    window.open(`https://wa.me/${waNumber}?text=${waMessage}`, '_blank');
                    window.location.href = "{{ route('user.bookings.index') }}";
                } else {
                    alert("Gagal menyimpan: " + (result.message || "Terjadi kesalahan"));
                    submitButton.disabled = false;
                    submitButton.textContent = 'Konfirmasi & Lanjutkan ke WhatsApp';
                }
            } catch (error) {
                alert("Kesalahan koneksi ke server. Pastikan server lokal Anda aktif.");
                submitButton.disabled = false;
                submitButton.textContent = 'Konfirmasi & Lanjutkan ke WhatsApp';
            }
        });

        document.addEventListener('DOMContentLoaded', fetchServices);
    </script>
</x-app-layout>