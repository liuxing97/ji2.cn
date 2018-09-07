<script src="/js/jquery-1.11.3.min.js"></script>
<script src="/js/jquery.dataTables.1.10.9.min.js"></script>
<script src="/js/dataTables.buttons.1.2.4.min.js"></script>
<script src="/js/buttons.flash.1.2.4.min.js"></script>
<script src="/js/jszip.2.5.0.min.js"></script>
<script src="/js/pdfmake.0.1.18.min.js"></script>
<script src="/js/vfs_fonts.0.1.18.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script src="{{ url('adminlte/js') }}/bootstrap.min.js"></script>
<script src="{{ url('adminlte/js') }}/select2.full.min.js"></script>
<script src="{{ url('adminlte/js') }}/main.js"></script>
<script src="{{ url('adminlte/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ url('adminlte/plugins/fastclick/fastclick.js') }}"></script>
<script src="{{ url('adminlte/js/app.min.js') }}"></script>
<script>
    window._token = '{{ csrf_token() }}';
</script>

{{--<script src="/js/jquery-3.3.1.min.js"></script>--}}
<link rel="stylesheet" href="/module/loading/jquery.mloading.css">
<script src="/module/loading/jquery.mloading.js"></script>
<script src="/module/loading/use.js"></script>
<link href="/module/notice/toastr.css" rel="stylesheet"/>
<script src="/module/notice/toastr.js"></script>
<script src="/js/http.js"></script>
<script src="/module/select/js/selectFilter.js"></script>
<script src="/adminlte/js/init.js"></script>

@yield('javascript')