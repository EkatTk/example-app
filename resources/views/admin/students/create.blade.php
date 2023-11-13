@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <h1>Студенты</h1>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Добавить нового студента</h3>
            </div>
            <form role="form" method="post" action="{{ route('students.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_room">Комната</label>
                        <select class="form-control @error('id_room') is-invalid @enderror" id="id_room" name="id_room">
                            @foreach($rooms as $k => $v)
                                <option value="{{ $k }}">{{ $v }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="surname">Фамилия</label>
                        <input type="text" class="form-control @error('surname') is-invalid @enderror" id="surname" name="surname" placeholder="Введите фамилию">
                    </div>
                    <div class="form-group">
                        <label for="name">Имя</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Введите имя">
                    </div>
                    <div class="form-group">
                        <label for="patronymic">Отчество</label>
                        <input type="text" class="form-control @error('patronymic') is-invalid @enderror" id="patronymic" name="patronymic" placeholder="Введите отчество">
                    </div>
                    <div class="form-group">
                        <label for="group">Группа</label>
                        <input type="text" class="form-control @error('group') is-invalid @enderror" id="group" name="group" placeholder="Введите группу">
                    </div>
                    <div class="form-group">
                        <label for="passport">Паспорт</label>
                        <input type="text" class="form-control @error('passport') is-invalid @enderror" id="passport" name="passport" placeholder="Введите серрию и номер паспорта">
                    </div>
                    <div class="form-group">
                        <label for="issued_pas">Кем выдан</label>
                        <input type="text" class="form-control @error('issued_pas') is-invalid @enderror" id="issued_pas" name="issued_pas" placeholder="Введите место выдачи">
                    </div>
                    <div class="form-group">
                        <label for="date_pas">Дата выдачи</label>
                        <input type="date" class="form-control @error('date_pas') is-invalid @enderror" id="date_pas" name="date_pas">
                    </div>
                    <div class="form-group">
                        <label for="date_births">Дата выдачи</label>
                        <input type="date" class="form-control @error('date_births') is-invalid @enderror" id="date_births" name="date_births">
                    </div>
                    <div class="form-group">
                        <label for="hometown">Родной город</label>
                        <input type="text" class="form-control @error('hometown') is-invalid @enderror" id="hometown" name="hometown" placeholder="Введите родной город">
                    </div>
                    <div class="form-group">
                        <label for="contract">Добавить скан договора</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="contract" id="contract" class="custom-file-input @error('contract') is-invalid @enderror">
                                <label class="custom-file-label" for="contract" id="label">Выберите файл</label>
                            </div>
                        </div>
                    </div>
                    <div><a id="file" href="{{ $student->getContract() }}">{{ $student->contract }}</a></div>
                    <div class="form-group">
                        <label for="balance">Баланс</label>
                        <input type="text" class="form-control @error('balance') is-invalid @enderror" id="balance" name="balance" placeholder="0">
                    </div>
                    <div class="form-group">
                        <label for="phone">Телефон</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Введите номер телефона">
                    </div>
                    <div class="form-group">
                        <label for="email">Почта</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Введите электронную почту">
                    </div>
                    <div class="form-group">
                        <label for="work_out">Отработано часов</label>
                        <input type="number" class="form-control @error('work_out') is-invalid @enderror" id="work_out" name="work_out" placeholder="Введите электронную почту">
                    </div>
                    <div class="form-group">
                        <label for="date_flg">Дата последней флюрографии</label>
                        <input type="date" class="form-control @error('date_flg') is-invalid @enderror" id="date_flg" name="date_flg">
                    </div>
                    <div class="form-group">
                        <label for="photo">Добавить фото</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="photo" id="photo" class="custom-file-input @error('photo') is-invalid @enderror">
                                <label class="custom-file-label" for="photo" id="label">Выберите файл</label>
                            </div>
                        </div>
                    </div>
                    <div><img id="image" src="{{ $student->getImage() }}" alt="" class="img-thumbnail mt-2 mb-2" width="200"></div>
                    <div class="form-group">
                        <input type="button" class="btn btn-danger btn-sm" name="del_photo" onclick="return confirm('Подтвердите удаление')" value="Удалить фото" disabled="disabled"/>
                        <i class="fas fa-trash-alt"></i>
                    </div>
                    <div class="form-group">
                        <label for="properties">Имущество</label>
                        <select name="properties[]" id="properties" class="select2 @error('properties') is-invalid @enderror" multiple="multiple"
                                data-placeholder="Выбор имущества" style="width: 100%;">
                            @foreach($properties as $k => $v)
                                <option value="{{ $k }}">{{ $v }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </div>
            </form>
        </div>
    </section>
    <script>
        document.getElementById('photo').onchange = function () {
            var src = URL.createObjectURL(this.files[0])
            document.getElementById('image').src = src
            //document.getElementById('del_photo').disabled = "enable";
            //document.getElementById('label').innerHTML = this.files[0].name;
        }
        document.getElementById('contract').onchange = function () {
            var href = URL.createObjectURL(this.files[0])
            document.getElementById('file').href = href
            //document.getElementById('label').innerHTML = this.files[0].name;
        }
    </script>
@endsection
