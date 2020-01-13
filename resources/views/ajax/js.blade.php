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
        

        $('.verify').on('click',function() {
            const id = $(this).attr('ide');
            var v = $(this).attr('verified');
            if (v == "0") {
                v = 1;
                $(this).attr('verified','1');
                // $(this).html('Unverify');
            }else{
                v = 0;
                $(this).attr('verified','0');
                // $(this).html('Verify');
            }

            $.post('admin/verify/'+id,{
                '_token' : token,
                'v' : v
            },(res)=>{
             // if (res == '1') {
             //    $('.event_going_'+id).attr('attending',res);
             //    $('.event_going_'+id).html('Users Going: '+res);
             // }else{
             //    $('.event_going_'+id).attr('attending',res);
             //    $('.event_going_'+id).html('Users Going: '+res);
             // }
            });
        });


        $('.attend_event').on('click',function(){
            const id = $(this).attr('ide');
            var a = $(this).attr('attend');
            if (a == "0") {
                a = 1;
                $(this).attr('attend','1');
                $(this).html('Unattend');
            }else{
                a = 0;
                $(this).attr('attend','0');
                $(this).html('Attend');
            }
            alert(a)
            $.post('attend/'+id,{
                '_token' : token,
                'a' : a
            },(res) => {
                $('.event_going_'+id).attr('attending',res);
                $('.event_going_'+id).html('Users Going: '+res);
            });

        });
        

        // //pusher for my messages
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
        

        $('.chatwithme').on('click',function(){
            const other_id = $(this).attr('ide');
            const name = $(this).html();
            const chats = JSON.parse($(this).attr('mess'));


            $('#default-m').hide();
            $('.messages').show();
            $('#chat-name').html(name);

            //go and include all the chats init
            chats.forEach((e) => {
                const id = e.sender_id;
                if (id == {{auth()->user()->id}}) {
                    $('<p class="sent"><span class="text">' + e.message + '</span></p>').appendTo('#chats');
                }else{
                    $('<p class="replies"><span class="text">' + e.message + '</span></p>').appendTo('#chats');
                }
            });

        })

        $('#send-message-btn').on('click', (e) => {
            e.preventDefault();
            const message = $('#chat-message').val();
            const other_id = $('#otherid').val();

            $.post('message/'+other_id,{
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

        $('#user-search').on('click',(e) => {
            e.preventDefault();

            const username = $('#search-user').val();


            $.post('searchuser',{
                '_token': token,
                'username':username
            },(res) => {
                const result = JSON.parse(res);
                $('#search-info').empty();
                
                result.forEach(r => {
                    var c = $('<div class="card" style="margin-bottom:0.1rem;"></div>');
                    c.appendTo('#search-info');
                    $('<p><a href="{{  }}">'+ r.name +'</a></p>').appendTo(c);
                });
            });
        });
    });

</script>