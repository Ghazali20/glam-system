<x-app-layout>
    <div class="py-12 md:py-16 bg-[#faf8f5] min-h-[85vh]">
        <div class="max-w-5xl w-full mx-auto px-4 sm:px-6">
            <div class="mb-8 text-center">
                <span class="text-[10px] uppercase tracking-[0.3em] text-rose-700 font-bold block mb-2">Secure Reservation</span>
                <h2 class="text-3xl md:text-5xl font-serif italic text-stone-900">Reservasi Jadwal MUA</h2>
                <p class="mt-3 text-sm text-stone-500 font-serif italic">Isi detail acara sekali, lalu dapatkan invoice dan instruksi pembayaran yang jelas.</p>
            </div>

            <div id="stepIndicator" class="mb-8 grid grid-cols-1 gap-3 sm:grid-cols-3">
                <div data-step-indicator="1" class="rounded-2xl border border-rose-200 bg-white p-4 text-center">
                    <span class="text-[9px] font-bold uppercase tracking-widest text-rose-700">01</span>
                    <p class="mt-1 text-xs font-semibold text-stone-800">Detail acara</p>
                </div>
                <div data-step-indicator="2" class="rounded-2xl border border-stone-200 bg-white p-4 text-center opacity-60">
                    <span class="text-[9px] font-bold uppercase tracking-widest text-stone-400">02</span>
                    <p class="mt-1 text-xs font-semibold text-stone-800">Pilih pembayaran</p>
                </div>
                <div data-step-indicator="3" class="rounded-2xl border border-stone-200 bg-white p-4 text-center opacity-60">
                    <span class="text-[9px] font-bold uppercase tracking-widest text-stone-400">03</span>
                    <p class="mt-1 text-xs font-semibold text-stone-800">Konfirmasi WhatsApp</p>
                </div>
            </div>

            <div class="bg-white p-6 sm:p-10 md:p-14 rounded-[2.5rem] shadow-[0_15px_40px_rgba(0,0,0,0.03)] border border-stone-200/80">

                <form id="bookingForm" class="text-left" novalidate>
                    @csrf

                    <section data-step="1" class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8">
                        <div class="md:col-span-2 mb-1">
                            <h3 class="font-serif text-2xl italic text-stone-900">Detail acara</h3>
                            <p class="mt-1 text-xs text-stone-500">Data ini membantu MUA menyiapkan waktu dan perlengkapan yang tepat.</p>
                        </div>
                        <div class="border-b border-stone-200 pb-2">
                            <label class="text-[9px] uppercase tracking-[0.2em] text-rose-700 font-bold block mb-1">Nama Lengkap</label>
                            <input type="text" id="name" value="{{ Auth::user()->name }}" readonly class="w-full border-none p-0 focus:ring-0 text-stone-800 bg-transparent font-medium">
                        </div>
                        <div class="border-b border-stone-200 pb-2">
                            <label class="text-[9px] uppercase tracking-[0.2em] text-stone-400 font-bold block mb-1">Nomor WhatsApp</label>
                            <input type="tel" id="whatsapp" placeholder="08..." required class="w-full border-none p-0 focus:ring-0 text-stone-700 bg-transparent">
                        </div>
                        <div class="border-b border-stone-200 pb-2">
                            <label class="text-[9px] uppercase tracking-[0.2em] text-stone-400 font-bold block mb-1">Pilih Layanan</label>
                            <select id="service" required class="w-full border-none p-0 focus:ring-0 text-stone-700 bg-transparent cursor-pointer">
                                <option value="" disabled selected>Memuat layanan...</option>
                            </select>
                        </div>
                        <div class="border-b border-stone-200 pb-2">
                            <label class="text-[9px] uppercase tracking-[0.2em] text-stone-400 font-bold block mb-1">Jenis Acara</label>
                            <select id="event_type" required class="w-full border-none p-0 focus:ring-0 text-stone-700 bg-transparent">
                                <option value="" disabled selected>Pilih jenis acara</option>
                                <option value="Wedding">Wedding</option>
                                <option value="Engagement">Engagement / Lamaran</option>
                                <option value="Graduation">Wisuda</option>
                                <option value="Prewedding">Prewedding</option>
                                <option value="Party">Party / Acara Formal</option>
                                <option value="Other">Lainnya</option>
                            </select>
                        </div>
                        <div class="border-b border-stone-200 pb-2">
                            <label class="text-[9px] uppercase tracking-[0.2em] text-stone-400 font-bold block mb-1">Tanggal Acara</label>
                            <input type="date" id="date" min="{{ now()->format('Y-m-d') }}" required class="w-full border-none p-0 focus:ring-0 text-stone-500 bg-transparent">
                        </div>
                        <div class="border-b border-stone-200 pb-2">
                            <label class="text-[9px] uppercase tracking-[0.2em] text-stone-400 font-bold block mb-1">Jam Mulai Makeup</label>
                            <input type="time" id="event_time" required class="w-full border-none p-0 focus:ring-0 text-stone-500 bg-transparent">
                        </div>
                        <div class="border-b border-stone-200 pb-2">
                            <label class="text-[9px] uppercase tracking-[0.2em] text-stone-400 font-bold block mb-1">Jumlah yang Dirias</label>
                            <input type="number" id="attendee_count" min="1" max="50" value="1" required class="w-full border-none p-0 focus:ring-0 text-stone-700 bg-transparent">
                        </div>
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
                        <div class="md:col-span-2 border-b border-stone-200 pb-2">
                        <label class="text-[9px] uppercase tracking-[0.2em] text-stone-400 font-bold block mb-1">Alamat Lengkap & Catatan</label>
                        <textarea id="address" rows="2" placeholder="Nama jalan, nomor rumah, atau catatan tambahan..." required class="w-full border-none p-0 focus:ring-0 text-stone-700 bg-transparent resize-none"></textarea>
                        </div>
                        <div class="md:col-span-2 border-b border-stone-200 pb-2">
                            <label class="text-[9px] uppercase tracking-[0.2em] text-stone-400 font-bold block mb-1">Permintaan Khusus (opsional)</label>
                            <textarea id="special_requests" rows="2" placeholder="Alergi produk, referensi makeup, atau kebutuhan touch-up..." class="w-full border-none p-0 focus:ring-0 text-stone-700 bg-transparent resize-none"></textarea>
                        </div>
                        <div class="md:col-span-2 flex justify-end pt-2">
                            <button type="button" data-next-step="2" class="rounded-full bg-stone-900 px-8 py-4 text-[10px] font-bold uppercase tracking-[0.2em] text-white transition hover:bg-rose-700">Lanjut ke Pembayaran</button>
                        </div>
                    </section>

                    <section data-step="2" class="hidden space-y-8">
                        <div>
                            <h3 class="font-serif text-2xl italic text-stone-900">Pilih pembayaran</h3>
                            <p class="mt-1 text-xs text-stone-500">Pilih rekening atau QRIS yang akan digunakan setelah invoice dibuat.</p>
                        </div>
                        <div class="border-b border-stone-200 pb-2">
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
                        <div class="flex justify-between pt-2">
                            <button type="button" data-prev-step="1" class="rounded-full border border-stone-300 px-8 py-4 text-[10px] font-bold uppercase tracking-[0.2em] text-stone-600">Kembali</button>
                            <button type="button" data-next-step="3" class="rounded-full bg-stone-900 px-8 py-4 text-[10px] font-bold uppercase tracking-[0.2em] text-white transition hover:bg-rose-700">Periksa & Konfirmasi</button>
                        </div>
                    </section>

                    <section data-step="3" class="hidden space-y-8">
                        <div>
                            <h3 class="font-serif text-2xl italic text-stone-900">Konfirmasi WhatsApp</h3>
                            <p class="mt-1 text-xs text-stone-500">Periksa data berikut sebelum membuat invoice dan mengirim konfirmasi ke admin.</p>
                        </div>
                        <div id="bookingSummary" class="grid gap-3 rounded-2xl bg-stone-50 p-5 text-sm text-stone-700"></div>
                        <div class="flex justify-between pt-2">
                            <button type="button" data-prev-step="2" class="rounded-full border border-stone-300 px-8 py-4 text-[10px] font-bold uppercase tracking-[0.2em] text-stone-600">Kembali</button>
                            <button id="submitButton" type="submit" class="rounded-full bg-rose-700 px-8 py-4 text-[10px] font-bold uppercase tracking-[0.2em] text-white transition hover:bg-stone-900 disabled:cursor-not-allowed disabled:opacity-60">Buat Booking & Kirim WhatsApp</button>
                        </div>
                    </section>
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

        let currentStep = 1;
        const stepSections = document.querySelectorAll('[data-step]');
        const stepIndicators = document.querySelectorAll('[data-step-indicator]');

        function validateStep(step) {
            const section = document.querySelector(`[data-step="${step}"]`);
            const fields = section.querySelectorAll('input[required], select[required], textarea[required]');
            for (const field of fields) {
                if (!field.checkValidity()) {
                    field.reportValidity();
                    return false;
                }
            }
            return true;
        }

        function updateSummary() {
            const service = document.getElementById('service');
            const location = `${document.getElementById('regency').value}, ${document.getElementById('district').value}`;
            document.getElementById('bookingSummary').innerHTML = `
                <div><strong>Nama:</strong> ${document.getElementById('name').value}</div>
                <div><strong>Layanan:</strong> ${service.options[service.selectedIndex]?.text || '-'}</div>
                <div><strong>Acara:</strong> ${document.getElementById('event_type').selectedOptions[0]?.text || '-'}</div>
                <div><strong>Jadwal:</strong> ${document.getElementById('date').value} pukul ${document.getElementById('event_time').value}</div>
                <div><strong>Jumlah yang dirias:</strong> ${document.getElementById('attendee_count').value} orang</div>
                <div><strong>Lokasi:</strong> ${location}</div>
                <div><strong>Pembayaran:</strong> ${document.getElementById('payment_method').selectedOptions[0]?.text || '-'}</div>
            `;
        }

        function showStep(step) {
            currentStep = step;
            stepSections.forEach(section => section.classList.toggle('hidden', Number(section.dataset.step) !== step));
            stepIndicators.forEach(indicator => {
                const active = Number(indicator.dataset.stepIndicator) === step;
                indicator.classList.toggle('opacity-60', !active);
                indicator.classList.toggle('border-rose-200', active);
                indicator.classList.toggle('border-stone-200', !active);
            });
            if (step === 3) updateSummary();
            window.scrollTo({ top: document.getElementById('stepIndicator').offsetTop - 24, behavior: 'smooth' });
        }

        document.querySelectorAll('[data-next-step]').forEach(button => {
            button.addEventListener('click', () => {
                const nextStep = Number(button.dataset.nextStep);
                if (validateStep(currentStep)) showStep(nextStep);
            });
        });

        document.querySelectorAll('[data-prev-step]').forEach(button => {
            button.addEventListener('click', () => showStep(Number(button.dataset.prevStep)));
        });

        document.getElementById('bookingForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            if (!validateStep(1) || !validateStep(2)) {
                showStep(!validateStep(1) ? 1 : 2);
                return;
            }
            const submitButton = document.getElementById('submitButton');
            submitButton.disabled = true;
            submitButton.textContent = 'Menyimpan Reservasi...';
            const fullLocation = `${document.getElementById('regency').value}, ${document.getElementById('district').value}. ${document.getElementById('address').value}`;
            const formData = {
                service_id: document.getElementById('service').value,
                booking_date: document.getElementById('date').value,
                event_type: document.getElementById('event_type').value,
                event_time: document.getElementById('event_time').value,
                attendee_count: document.getElementById('attendee_count').value,
                whatsapp: document.getElementById('whatsapp').value,
                location: fullLocation,
                address_details: document.getElementById('address').value,
                special_requests: document.getElementById('special_requests').value,
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
                    if (result.whatsapp_url) window.open(result.whatsapp_url, '_blank', 'noopener');
                    alert(`Booking ${result.invoice_number} berhasil dibuat. Instruksi pembayaran tersedia di halaman riwayat pesanan.`);
                    window.location.href = "{{ route('user.bookings.index') }}";
                } else {
                    alert("Gagal menyimpan: " + (result.message || "Terjadi kesalahan"));
                    submitButton.disabled = false;
                    submitButton.textContent = 'Buat Booking & Kirim WhatsApp';
                }
            } catch (error) {
                alert("Kesalahan koneksi ke server. Pastikan server lokal Anda aktif.");
                submitButton.disabled = false;
                submitButton.textContent = 'Buat Booking & Kirim WhatsApp';
            }
        });

        document.addEventListener('DOMContentLoaded', fetchServices);
    </script>
</x-app-layout>