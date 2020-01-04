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
    

        $("#menu-toggle").on('click',(e) => {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });


        $('#valevent').on('click',(e) => {
            c = $(this).val();
            if(c === 'verified'){
                $(this).val('notVerified');
                v = 0;
            }else{
                $(this).val('verified');
                v = 1;
            }

            $.post('eventid',{
                '_token' : token,
                'v' : v
            });
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
    });
</script>