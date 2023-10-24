@extends('layouts.frontend.main')
@section('title', 'Pengumuman')
@section('content')
    <!-- Hero Start -->
    <section class="bg-half-170 bg-light d-table w-100">
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="pages-heading">
                        <h4 class="title mb-0"> Pengumuman </h4>
                    </div>
                </div> <!--end col-->
            </div><!--end row-->
        </div> <!--end container-->
    </section><!--end section-->

    <!-- Start -->
    <section class="section overflow-hidden"
        style="background: url('{{ asset('assets_frontend') }}/images/shapes/shape2.png') center center;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-title text-center mb-4 pb-2">
                        <h6 class="text-primary">Dewan Kerja Cabang Kuningan</h6>
                        <h4 class="title mb-4">Pengumuman Pendaftaran</h4>
                        <p class="text-muted para-desc mx-auto mb-0">Start working with <span
                                class="text-primary fw-bold">Landrick</span> that can provide everything you need to
                            generate awareness, drive traffic, connect.</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                <div class="col-md-12 mt-4 pt-2">
                    <div class="table-responsive">
                        <table class="table border-0 table-hover table-center mb-0">
                            <thead class="student-thread">
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Pangkalan</th>
                                    <th>Golongan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pendaftaran as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->user->name }}</td>
                                        <td>{{ $row->pangkalan }}</td>
                                        <td>{{ $row->golongan_name }}</td>
                                        <td>
                                            @if ($row->status == 1)
                                                <span>Dalam Proses</span>
                                            @elseif ($row->status == 2)
                                                <span>Terima</span>
                                            @elseif ($row->status == 3)
                                                <span>Tolak</span>
                                            @else
                                                <span>Status Tidak Valid</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">Data Tidak Tersedia</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->
@endsection
