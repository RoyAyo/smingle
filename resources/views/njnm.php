		<div class="col-lg-8 useless-chat">
			<div class="card">
				<div class="message-card">
					<div class="messages">
						<div class="message-header">
							<img src="{{ asset('images/icons/arrow-left-128.png') }}" style="width: 25px;height: 25px;display: none;">
							<span id="chat-name"></span>
						</div>
						<div class="message-body">
							<div id="chats">

							</div>
							<div class="message-input">
								<form action="">
									<input type="hidden" id="otherid" >
									<input id="chat-message" type="text" placeholder="Message..." /><button type="submit" id="send-message-btn" style="display: inline-block;" class="btn btn-sm"><img src="{{ asset('images/icons/arrow-right-128.png') }}"></button>
				        		</form>
			        		</div>
			        	</div>
					</div>
					<div id="default-m">
						No Message Has Been Selected
					</div>
				</div>
			</div>
		</div>