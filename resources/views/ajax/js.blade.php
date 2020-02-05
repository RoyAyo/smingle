<script>
    $('document').ready(() =>{
        const token = $('meta[name="csrf-token"]').attr('content');

        $('#user-sub').on('click',(e) => {
            e.preventDefault();
            $('#loader-div').show();
            const username = $('#check-user-match').val();
            const using = $('#comp-with').val();

            $.post("{{ route('comp.check') }}",{
               '_token' : token,
               'username' : username,
               'using' : using
            },(res) => {
                const result = res;

                if (typeof result == 'string') {
                    $('#match-perc').html(res);
                    $('#loader-div').hide();
                    return;
                }
                $('.matched-title').html('!!!');
                
                $('#twm').hide();
                $('#igm').hide();

                $('#loader-div').hide();

                $('#immatch').attr('src','../'+result.avatar );

                $('#namematch').html(result.name);

                $('#matchscore').html(result.score);

                $('#matchedsmprofile').attr('href','user/'+result.username);

                $('#agematch').html(res.age);

                $('#matched-div').show();

            });
        });

        $('#find-match-btn').on('click',(e) => {
            e.preventDefault();
            $('#loader-div').show(); 
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
            const job = $('#filter_job').val();
            const body_shape = $('#filter_body_shape').val();
            const skin_colour = $('#filter_skin_colour').val();
            const model = $('#filter_model').val();

            $.post("{{ route('match.check') }}",{
               '_token' : token,
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
               'level' : level,
               'job' : job,
               'body_shape':body_shape,
               'skin_colour':skin_colour,
               'model':model
            },(res) => {
                const result = res;

                if (typeof result == 'string') {
                    toastr.error(result);
                    $('#loader-div').hide();
                    return;
                }
                $('#loader-div').hide();

                $('#namematch').html(result.name);

                $('#immatch').attr('src','../'+result.avatar );
                
                $('#matchscore').html(result.score);

                $('#matchedsmprofile').attr('href','user/'+result.username);

                $('#matchedtwprofile').attr('href','https://twitter.com/'+result.twitter);
                
                $('#matchedigprofile').attr('href','https://www.instagram.com/'+result.instagram);

                $('#agematch').html(res.age);

                $('#matched-div').show();

            });
        });
    
        $('#find-match-event-btn').on('click',(e) => {
            e.preventDefault();
            $('#loader-div').show();  
            const filter_event_id = $('#filter_event_id').val();
            const age = $('#filter_event_age').val();
            const location = $('#filter_event_location').val();
            const religion = $('#filter_event_religion').val();
            const height = $('#filter_event_height').val();
            const r_status = $('#filter_event_r_status').val();
            const m_status = $('#filter_event_m_status').val();
            const need = $('#filter_event_need').val();
            const student = $('#filter_event_student').val();
            const school = $('#filter_event_school').val();
            const course = $('#filter_event_course').val();
            const level = $('#filter_event_level').val();
            const job = $('#filter_event_job').val();
            const body_shape = $('#filter_event_body_shape').val();
            const skin_colour = $('#filter_event_skin_colour').val();
            const model = $('#filter_event_model').val();

            $.post("../"+filter_event_id,{
               '_token' : token,
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
               'level' : level,
               'job' : job,
               'body_shape':body_shape,
               'skin_colour':skin_colour,
               'model':model
            },(res) => {
                const result = res;

                if (typeof result == 'string') {
                    alert(result);
                    $('#loader-div').hide();
                    return;
                }
                $('#loader-div').hide();

                $('#namematch').html(result.name);

                $('#immatch').attr('src','../'+result.avatar );

                $('#matchscore').html(result.score);

                $('#matchedsmprofile').attr('href','../../../user/'+result.username);

                $('#matchedtwprofile').attr('href','https://twitter.com/'+result.twitter);
                
                $('#matchedigprofile').attr('href','https://www.instagram.com/'+result.instagram);

                $('#agematch').html(result.age);

                $('#matched-div').show();

            });
        });
    
        $("#menu-toggle").on('click',(e) => {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        
        

        //pusher for my messages
            Pusher.logToConsole = true;

            var pusher = new Pusher('0af97750b30e5e72df02', {
                cluster: 'eu',
                forceTLS: true
            });

            var channel = pusher.subscribe('my-channel');
            channel.bind('my-event', function(data) {
                $('#chat-message').val("");
                if (data.message.sender_id == {{auth()->user()->id}}) {
                    $('<p class="sent"><span class="text">' + data.message.message + '</span></p>').appendTo('#chats');                 
                }else{
                    $('<p class="replies"><span class="text">' + data.message.message + '</span></p>').appendTo('#chats');
                }
            });
        
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

        $('#closematchdiv').on('click',() => {
            $('#matched-div').fadeOut(400);
        });

        $('#anon-r').on('click',function() {
            $(this).css('background-color','#fff');
            $('#anon-rp').css('background-color','');
            $('#anon-received').slideDown(300);
            $('#anon-replies').slideUp(300);
        });

        $('#anon-rp').on('click',function() {
            $(this).css('background-color','#fff');
            $('#anon-r').css('background-color','');
            $('#anon-replies').slideDown(300);
            $('#anon-received').slideUp(300);
        });


        $('.anon-reply').on('click',function(){
            const a_id = $(this).attr('a_id');
            const r_id = $(this).attr('r_id');

            $('#anon-reply-id').val(a_id);
            $('#anon-receiver-id').val(r_id);

            return;
        });

        if ($('.message-body').length > 0 ) {

            $('.message-body').stop().animate({
                scrollTop:$('.message-body')[0].scrollHeight
            });

        }

        $('#delevent').on('click',() => {
            if(confirm('Are you sure you want to delete this event')){
                toastr.success('Event has been deleted');
                toastr.info('Users no longer have access to the event');
            }else{
                toastr.error('Event not deleted');
            }
        })
    });

</script>