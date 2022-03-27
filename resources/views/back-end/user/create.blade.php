@extends('back-end.master.master')
@section('content-body')
    <!-- row -->
    <div class="container-fluid">
        <div class="page-titles">
            <h4>Element</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Element</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Custom file input</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form custom_file_input">
                            <form action="{{route('new-user')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control input-default " placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control input-default " placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="name" class="form-control input-default " placeholder="Họ và tên">
                                </div>
{{--                                <div class="form-group">--}}
{{--                                    <input type="datepicker" name="datepicker" class="form-control input-default " placeholder="Date">--}}
{{--                                </div>--}}

                                <div class="input-group">
                                    <select class="default-select" name="category">
                                        <option selected disabled>Danh mục bệnh</option>
                                        <option value="Trồng răng">Trồng răng</option>
                                        <option value="Khám răng">Khám răng</option>
                                        <option value="Sửa răng">Sửa răng</option>
                                        <option value="Niềng răng">Niềng răng</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">Button</button>
                                    </div>
                                </div>

                                <div class="input-group">
                                    <div class="custom-file">
                                        <input id="img_upload" type="file" class="custom-file-input" name="images[]" multiple>
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <div class="filearray"></div>
                                </div>
                                <button type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $(document).on('ready', () => {
            $("#img_upload").on('change', function () {
                $(".filearray").empty();//you can remove this code if you want previous user input
                for (let i = 0; i < this.files.length; ++i) {
                    let filereader = new FileReader();
                    let $img = jQuery.parseHTML("<img src='' style='width: 90px;height: 90px'>");
                    filereader.onload = function () {
                        $img[0].src = this.result;
                    };
                    filereader.readAsDataURL(this.files[i]);
                    $(".filearray").append($img);
                }
            });
        });
    </script>
@endsection
@section('content-footer')
    <!-- Dashboard 1 -->

@endsection
