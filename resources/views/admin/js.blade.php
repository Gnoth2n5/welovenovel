    <script src="{{ asset('administrator/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('administrator/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('administrator/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="{{ asset('administrator/dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('administrator/dist/js/feather.min.js') }}"></script>
    <script src="{{ asset('administrator/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('administrator/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('administrator/dist/js/custom.min.js') }}"></script>
    <!--This page JavaScript -->
    <script src="{{ asset('administrator/assets/extra-libs/c3/d3.min.js') }}"></script>
    <script src="{{ asset('administrator/assets/extra-libs/c3/c3.min.js') }}"></script>
    <script src="{{ asset('administrator/assets/libs/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('administrator/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}">
    </script>
    <script src="{{ asset('administrator/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('administrator/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('administrator/dist/js/pages/dashboards/dashboard1.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"
        integrity="sha512-HWlJyU4ut5HkEj0QsK/IxBCY55n5ZpskyjVlAoV9Z7XQwwkqXoYdCIC93/htL3Gu5H3R4an/S0h2NXfbZk3g7w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        var route = "{{ url('search-autocomplete') }}";
        $('#search-bar').typeahead({
            source: function(term, process) {
                return $.get(route, {
                    term: term
                }, function(data) {
                    return process(data);
                });
            }
        });

        document.querySelector('.form-control-icon').addEventListener('click', function(event) {
            event.preventDefault();
            // Lấy form chứa icon
            var form = this.closest('form');
            // Submit form
            form.submit();
        });
    </script>
