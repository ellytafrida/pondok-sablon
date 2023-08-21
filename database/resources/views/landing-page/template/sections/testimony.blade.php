<section class="testimonials-area py-130">
    <div class="container rel">
        <div class="row justify-content-between pb-35">
            <div class="col-5">
                <div class="section-title mb-20 wow fadeInRight delay-0-2s">
                    <span class="sub-title mb-10">Testimoni</span>
                    <h2>Pendapat Klien Tentang Layanan Kami</h2>
                </div>
            </div>
            @if (Auth::check())
                <div class="col-7">
                    <div class="menu-sidebar float-end" style="font-size: 12pt;">
                        <button type="button" class="btn btn-danger">Beri Ulasan</button>
                    </div>
                </div>
            @endif
        </div>
        <div class="testimonial-active">
            @foreach (App\Models\Testimony::take(5)->inRandomOrder()->get() as $testimony)
                <div class="testimonial-item">
                    <div class="image">
                        <img src="{{ asset(empty($testimony->photo) ? 'images/blog-empty.jpg' : $testimony->photo) }}"
                            alt="Testimonial">
                    </div>
                    <div class="content">
                        <div class="text">
                            {{ $testimony->body }}
                        </div>
                        <div class="author">
                            <div class="title">
                                <h5>{{ $testimony->name }}</h5>
                                <span>{{ $testimony->from }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="circle-shapes">
            <div class="shape-inner">
                <span class="dot-one"></span>
                <span class="dot-two"></span>
                <span class="dot-three"></span>
                <span class="dot-four"></span>
                <span class="dot-five"></span>
            </div>
        </div>
    </div>
</section>

<section class="hidden-bar">
    <div class="inner-box">
        <div class="cross-icon"><span class="fa fa-times"></span></div>
        <div class="title text-center">
            <h4>Beri Ulasan</h4>
        </div>

        <!--Appointment Form-->
        <div class="appointment-form">
            <form id="testimony" action="testimony" method="POST">
                <div class="form-group">
                    <span id="fromError" class="text-danger" style="font-size: 12px;"></span>
                    <input type="text" name="from" placeholder="Asal Perusahaan/Brand">
                </div>
                <div class="form-group">
                    <span id="bodyError" class="text-danger" style="font-size: 12px;"></span>
                    <textarea placeholder="Ulasan" name="body" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <button id="submit" type="submit" class="theme-btn">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</section>

@push('script')
    <script>
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $("#testimony").on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: new FormData(this),
                processData: false,
                dataType: "json",
                contentType: false,
                beforeSend: function() {
                    $("#fromError").html('');
                    $("#bodyError").html('');
                },
                success: function(response) {
                    Swal.fire({
                        type: "success",
                        title: response.status,
                        text: response.message,
                        confirmButtonColor: "#59C4BC",
                        confirmButtonText: "Lanjut",
                        backdrop: true,
                        allowOutsideClick: () => {
                            console.log("Klik Tombol Lanjut");
                        },
                    }).then((result) => {
                        if (result.value == true) {
                            window.location.reload();
                        }
                    });
                },
                error: function(error) {
                    console.error(error);
                    if (error.status == 422) {
                        var responseError = error["responseJSON"]["errors"];
                        if (responseError["from"]) {
                            $("#fromError").html(responseError["from"]);
                        }

                        if (responseError["body"]) {
                            $("#bodyError").html(responseError["body"]);
                        }
                    }
                }
            });
        });
    </script>
@endpush
