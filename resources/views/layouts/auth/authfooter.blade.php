{{-- boostrap css1 js1   --}}
<script src="{{ asset('./assets/libs/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js') }}" type="text/javascript">
</script>
{{-- jquery  --}}
<script src="{{ asset('assets/libs/jquery/jquery-3.7.1.min.js') }}" type="text/javascript"></script>

{{-- custom js js1  --}}
<script src="{{ asset('assets/dist/js/app.js') }}" type="text/javascript"></script>

{{-- toaser notification css 1 js 1  --}}
<script src="{{ asset('assets/libs/toastr-master/build/toastr.min.js') }}" type="text/javascript"></script>

@if (Session::has('success'))
    <script>
        toastr.success("{{ session()->get('success') }}", 'Successful')
    </script>
@endif

@if (Session::has('info'))
    <script>
        toastr.info("{{ session()->get('info') }}", 'Information')
    </script>
@endif

@if (Session::has('error'))
    <script>
        toastr.error("{{ session()->get('error') }}", 'Incnoveivable')
    </script>
@endif

@if ($errors)
    @foreach ($errors->all() as $error)
        <script>
            toastr.error("{{ session()->get('info') }}", 'Information', {
                timeOut: 3000
            })
        </script>
    @endforeach
@endif




{{-- extra js  --}}
@yield('scripts')


</body>

</htmL>
