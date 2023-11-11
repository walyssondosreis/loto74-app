<div>
    @if (isset($errors) && $errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('mensagem'))
        <div class="alert alert-success">
            {{ session('mensagem') }}
        </div>
    @endif
</div>

{{-- <script>
    setTimeout(() => { document.querySelector('.alert').classList.add('translate-x-full'); }, 3000);
</script> --}}
