
        <input type='text' title="Activities Venue"
               required  placeholder='Type your venue'  maxlength=255 class='form-control'
               name="ar_venue" id="ar_venue" value=''/>

        <div class="text-danger"></div>
        <div id="ar_venue1"></div>
        <p class='help-block'></p>


@push('bottom')
    <script type="text/javascript">
        $('#ar_venue').keyup(function(){
                        var ar_venue = $(this).val();
                        if(ar_venue != ''){ 
                            $.ajax({
                                url:'http://localhost/actionaid/public/checkVenue/'+ ar_venue,
                                method:'GET',
                                success:function(data){  
                                    $('#ar_venue1').fadeIn();
                                    $('#ar_venue1').html(data);
                                }
                            });
                        }
                    }); 

                    $(document).on('click','li',function(){
                        $('#ar_venue').val($(this).text());
                        $('#ar_venue1').fadeOut(); 
                    });
    </script>
@endpush