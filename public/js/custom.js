<script type="text/javascript">
            $(function () {
                $('#pri_id, input:radio[name=pri_id]').change(function () {
                    var $current = $("#foc_id");
                    var parent_id = $(this).val();
                    var fk_name = "pri_id";
                    var fk_value = $(this).val();
                    var datatable = "ai_focusarea,foc_name".split(',');
                                                var datatableWhere = "pri_id = 4  &amp;&amp; id = 3";
                                        var table = datatable[0].trim('');
                    var label = datatable[1].trim('');
                    var value = "";

                    if (fk_value != '') {
                        $current.html("<option value=''>Please wait loading... Focus Name");
                        $.get("http://localhost/actionaid/public/admin/ai_indicators/data-table?table=" + table + "&label=" + label + "&fk_name=" + fk_name + "&fk_value=" + fk_value + "&datatable_where=" + encodeURI(datatableWhere), function (response) {
                            if (response) {
                                $current.html("<option value=''>Please Select Focus Area");
                                $.each(response, function (i, obj) {
                                    var selected = (value && value == obj.select_value) ? "selected" : "";
                                    $("<option " + selected + " value='" + obj.select_value + "'>" + obj.select_label + "</option>").appendTo("#foc_id");
                                })
                                $current.trigger('change');
                            }
                        });
                    } else {
                        $current.html("<option value=''>Please Select Focus Area");
                    }
                })

                $('#pri_id').trigger('change');
                $("input[name='pri_id']:checked").trigger("change");
                $("#foc_id").trigger('change');
            })
        </script>