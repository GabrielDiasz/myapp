
@csrf

@if(isset($id))
    <input type="hidden" name="id" value="{{ $id }}">
@endif

<div class="container">
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">Nome:</label>
        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ isset($data) ? $data->name : '' }}" autocomplete="name" required autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">E-mail:</label>
        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ isset($data) ? $data->email : '' }}" autocomplete="email" required autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">Senha:</label>
        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="password" required autofocus >
            @error('password')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Confirme a senha:</label>
        <div class="col-md-6">
            <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" autocomplete="password" required autofocus>
            @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    @php
        $count = 0;
    @endphp
    @if(isset($data) && $data->phones->count() > 0)
        @foreach($data->phones as $index => $phone)
            <div class="form-group row" id="phone{{ $count++ }}">
                <label for="phone" class="col-md-4 col-form-label text-md-right">Telefone:</label>
                <div class="col-md-6">
                    <input data-mask="(00) 0 0000-0000" id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone[]" autocomplete="phone" required autofocus value="{{ $phone->number }}">
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                @if($index > 0)
                    <a href="{{ route('phones.delete', [$phone->id, $id]) }}" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                @endif

            </div>
        @endforeach
    @else
        <div class="form-group row">
            <label for="phone" class="col-md-4 col-form-label text-md-right">Telefone:</label>
            <div class="col-md-6">
                <input id="phone" type="text" class="form-control phone @error('phone') is-invalid @enderror" name="phone[]" autocomplete="phone" required >
                @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    @endif

    <div id="newPhone"></div>

    <div class="form-group row mb-2">
        <div class="col-md-6 offset-md-4  ">
            <button type="button" onclick="addPhone()" class="btn btn-light float-right">
                Adicionar telefone
            </button>
            <button type="submit" class="btn btn-primary float-right mr-2">
                Salvar
            </button>
        </div>
    </div>
</div>

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function (){
            $('.phone').mask('(00) 0 0000-0000')
        })
        function addPhone() {
            let elementCloned = $(`#phone0`).clone();
            elementCloned[0].children[1].children[0].setAttribute('readonly', true)
            $('#newPhone').append(elementCloned);
            $('#phone').val('');
        }
    </script>
@stop
