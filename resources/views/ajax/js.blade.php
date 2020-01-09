<script>
    $('document').ready(() =>{
        const token = $('meta[name="csrf-token"]').attr('content');

        $('#user-sub').on('click',(e) => {
            e.preventDefault();
            $('#loader-div').show();
            const username = $('#check-user-match').val();

            $.post("{{ route('comp.check') }}",{
               '_token' : token,
               'username' : username
            },(res) => {
                $('#loader-div').hide(100);
                $('#match-perc').html(res);
            });
        });

        $('#find-match-btn').on('click',(e) => {
            e.preventDefault();
            $('#loader-div').show();
            const based_on = $('#filter_based_on').val();  
            const age = $('#filter_age').val();
            const location = $('#filter_location').val();
            const religion = $('#filter_religion').val();
            const height = $('#filter_height').val();
            const r_status = $('#filter_r_status').val();
            const m_status = $('#filter_m_status').val();
            const need = $('#filter_need').val();
            const student = $('#filter_student').val();
            const school = $('#filter_school').val();
            const course = $('#filter_course').val();
            const level = $('#filter_level').val();

            $.post("{{ route('match.check') }}",{
               '_token' : token,
               'based_on' : based_on,
               'age' : age,
               'location' : location,
               'religion' : religion,
               'height' : height,
               'r_status' : r_status,
               'm_status' : m_status,
               'need' : need,
               'student' : student,
               'school' : school,
               'course' : course,
               'level' : level
            },(res) => {
                $('#loader-div').hide();
                alert(res);
            });
        });
    

        $("#menu-toggle").on('click',(e) => {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });


        // $('#valevent').on('click',(e) => {
            
        //     e.preventDefault();

        //     $(this).attr('disabled',"disabled")

        //     $.post('eventid',{
        //         '_token' : token,
        //         'v' : 1
        //     });
        // });
        

        $('.verify').on('click',() => {
            const v = $(this).css('color');
            // if (v == "0") {
            //     $(this).attr('verified','1');
            // }else{
            //     $(this).attr('verified','0');
            // }

            // $.post('')
            alert(v);
        });

        

        //pusher for my messages
            // Pusher.logToConsole = true;

            // var pusher = new Pusher('0af97750b30e5e72df02', {
            //     cluster: 'eu',
            //     forceTLS: true
            // });

            // var channel = pusher.subscribe('my-channel');
            // channel.bind('my-event', function(data) {
            //     $('#chat-message').val("");
            //     if (data.message.sender_id == {{auth()->user()->id}}) {
            //         $('<p class="sent"><span class="text">' + data.message.message + '</span></p>').appendTo('#chats');                    
            //     }else{
            //         $('<p class="replies"><span class="text">' + data.message.message + '</span></p>').appendTo('#chats');                    
            //     }
            // });
    

        $('#send-message-btn').on('click', (e) => {
            e.preventDefault();
            const message = $('#chat-message').val();
            const other_id = $('#otherid').val();

            $.post(other_id,{
                '_token':token,
                'message':message
            });
        });

        $('#filter_student').on('change',function() {
            const s = $(this).val();
            if (s == 1) {
                $('#studentship').fadeIn(200);
            }else{
                $('#studentship').fadeOut(200);
            }
        });
    });

</script>