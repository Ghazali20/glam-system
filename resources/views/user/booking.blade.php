<x-app-layout>
    <div class="py-16 bg-[#faf8f5] flex justify-center items-center min-h-[85vh]">
        <div class="max-w-4xl w-full px-6">
            <div class="bg-white p-10 md:p-16 rounded-[3rem] shadow-[0_15px_40px_rgba(0,0,0,0.03)] border border-stone-200/80 text-center">
                <span class="text-[10px] uppercase tracking-[0.3em] text-rose-700 font-bold block mb-2">Reservation Form</span>
                <h2 class="text-3xl md:text-4xl font-serif italic text-stone-900 mb-12">Reservasi Jadwal MUA</h2>

                <form id="bookingForm" class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8 text-left">
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
                        <input type="date" id="date" required class="w-full border-none p-0 focus:ring-0 text-stone-500 bg-transparent">
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
                        <textarea id="address" rows="1" placeholder="Nama jalan, nomor rumah, atau catatan tambahan..." required class="w-full border-none p-0 focus:ring-0 text-stone-700 bg-transparent resize-none"></textarea>
                    </div>

                    {{-- Metode Pembayaran --}}
                    <div class="md:col-span-2 border-b border-stone-200 pb-2">
                        <label class="text-[9px] uppercase tracking-[0.2em] text-stone-400 font-bold block mb-1">Metode Pembayaran Transfer</label>
                        <select id="payment_method" required class="w-full border-none p-0 focus:ring-0 text-stone-700 bg-transparent">
                            <option value="" disabled selected>Pilih Bank Transfer Tujuan</option>
                            <option value="BCA">BCA - 12345678 (a/n Ramdiah)</option>
                            <option value="Mandiri">Mandiri - 88776655 (a/n Ramdiah)</option>
                        </select>
                    </div>

                    <button type="submit" class="md:col-span-2 bg-stone-900 text-white py-4 rounded-full font-bold uppercase text-[10px] tracking-[0.25em] hover:bg-rose-700 transition-all shadow-md italic mt-4">
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
            const fullLocation = `${document.getElementById('regency').value}, ${document.getElementById('district').value}. ${document.getElementById('address').value}`;
            const formData = {
                service_id: document.getElementById('service').value,
                booking_date: document.getElementById('date').value,
                whatsapp: document.getElementById('whatsapp').value,
                location: fullLocation,
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

                    alert("Pesanan dicatat! Anda akan diarahkan ke WhatsApp untuk konfirmasi pembayaran.");
                    window.open(`https://wa.me/${waNumber}?text=${waMessage}`, '_blank');
                    window.location.href = "{{ route('user.bookings.index') }}";
                } else {
                    alert("Gagal menyimpan: " + (result.message || "Terjadi kesalahan"));
                }
            } catch (error) {
                alert("Kesalahan koneksi ke server. Pastikan server lokal Anda aktif.");
            }
        });

        document.addEventListener('DOMContentLoaded', fetchServices);
    </script>
</x-app-layout>