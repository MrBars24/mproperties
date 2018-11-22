<?php include("includes/header.php"); ?>
<?php include("includes/menu.php"); ?>
<div class="small-11 medium-11 large-11 align-center messages-wrapper">
	<div class="row">
		<div class="small-12 medium-12 large-12 columns">
			<div class="tt-title">
				<h3>Messages</h3>
				<span class="ts-info-text">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium. voluptatum deleniti atque corrupti quos dolores </span>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="large-6 medium-6 small-6 columns">
			<p class="message-bold">5 unread messages</p>
		</div>
		<div class="large-6 medium-6 small-6 columns text-right">
			<p class="message-bold float-right">1-20 of 50 messages
				<span class="message-pager">
					<a href="#" class="ml-20"><img src="images/pagi-left-arrow.png" alt="" class="pagi-left"></a>
					<span class="mr-10"></span>
					<a href="#"><img src="images/pagi-right-arrow.png" alt="" class="pagi-right"></a>
				</span>
			</p>
		</div>
	</div>
	<div class="row border-image" style="border: 0;">
		<div class="messages-actions actions">
			<div class="large-3 medium-3 small-6 columns">
				<input type="checkbox" id="select-all" />
				<label for="select-all">Select All</label>
			</div>
			<div class="large-3 medium-3 small-6 columns">
				<div class="mark-all-read">
					Mark all as read
				</div>
			</div>
			<div class="large-3 medium-3 small-6 columns">
				<div class="sort-list">
					Sort Messages
				</div>
			</div>
			<div class="large-3 medium-3 small-6 columns">
				<div class="delete-list float-right">
					<i class="fa fa-trash" aria-hidden="true"></i> Delete
				</div>
			</div>
		</div>
	</div>

	<div class="row border-image">
		<div class="messages-actions message unread">
			<div class="check-wrap">
				<input type="checkbox" id="msg1" />
				<label for="msg1">msg1</label>
			</div>
			<div class="ov-special-wrap">
				<div class="large-10 medium10 small-12 columns">
					<div class="sender">
						<i class="fa fa-flag-o" aria-hidden="true"></i> <span>Admin</span>
					</div>
					<div class="message-data">
						<span class="bold">Special Announcement -</span> Tempor incididunt ut labore et dolore vero eos et accusamus et iusto odio ....
					</div>
				</div>
				<div class="large-2 medium-2 small-5 columns">
					<div class="message-date float-right">
						11.30pm, 20 Oct
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- unread style -->
	<div class="row border-image">
		<div class="messages-actions message unread">
			<div class="check-wrap">
				<input type="checkbox" id="msg2" />
				<label for="msg2">msg2</label>
			</div>
			<div class="ov-special-wrap">
				<div class="large-10 medium10 small-12 columns">
					<div class="sender">
						<span>Admin</span>
					</div>
					<div class="message-data">
						<span class="bold">Lorem ipsum dolor sit amet, consectetur adipiscing elit -</span> Tempor incididunt ut labore et dolore ....
					</div>
				</div>
				<div class="large-2 medium-12 small-12 columns">
					<div class="message-date float-right">
						9.30pm, 20 Oct
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row border-image">
		<div class="messages-actions message unread">
			<div class="check-wrap">
				<input type="checkbox" id="msg3" />
				<label for="msg3">msg3</label>
			</div>
			<div class="ov-special-wrap">
				<div class="large-10 medium10 small-12 columns">
					<div class="sender">
						<img src="images/msg-user/tan-zi-wei.png"> Tan Zi Wei
					</div>
					<div class="message-data">
						<span class="bold">Conversation -</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit tempor incididunt ut labore ....
					</div>
				</div>
				<div class="large-2 medium-12 small-12 columns">
					<div class="message-date float-right">
						19 Oct
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row border-image">
		<div class="messages-actions message unread">
			<div class="check-wrap">
				<input type="checkbox" id="msg4" />
				<label for="msg4">msg4</label>
			</div>
			<div class="ov-special-wrap">
				<div class="large-10 medium10 small-12 columns">
					<div class="sender">
						<img src="images/msg-user/default-user.png"> Larry Lim
					</div>
					<div class="message-data">
						<span class="bold">Conversation -</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit tempor incididunt ut labore ....
					</div>
				</div>
				<div class="large-2 medium-12 small-12 columns">
					<div class="message-date float-right">
						19 Oct
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row border-image">
		<div class="messages-actions message unread">
			<div class="check-wrap">
				<input type="checkbox" id="msg5" />
				<label for="msg5">msg5</label>
			</div>
			<div class="ov-special-wrap">
				<div class="large-10 medium10 small-12 columns">
					<div class="sender">
						<img src="images/msg-user/richard-tan.png"> Richard Tan
					</div>
					<div class="message-data">
						<span class="bold">Conversation -</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit tempor incididunt ut labore ....
					</div>
				</div>
				<div class="large-2 medium-12 small-12 columns">
					<div class="message-date float-right">
						19 Oct
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row border-image">
		<div class="messages-actions message">
			<div class="check-wrap">
				<input type="checkbox" id="msg6" />
				<label for="msg6">msg6</label>
			</div>
			<div class="ov-special-wrap">
				<div class="large-10 medium10 small-12 columns">
					<div class="sender">
						<span>Admin</span>
					</div>
					<div class="message-data">
						<span class="bold">Lorem ipsum dolor sit amet, consectetur adipiscing elit -</span> Tempor incididunt ut labore et dolore ....
					</div>
				</div>
				<div class="large-2 medium-12 small-12 columns">
					<div class="message-date float-right">
						9.30pm, 20 Oct
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row border-image">
		<div class="messages-actions message">
			<div class="check-wrap">
				<input type="checkbox" id="msg7">
				<label for="msg7">msg7</label>
			</div>
			<div class="ov-special-wrap">
				<div class="large-10 medium10 small-12 columns">
					<div class="sender">
						<img src="images/msg-user/tan-zi-wei.png"> Tan Zi Wei
					</div>
					<div class="message-data">
						<span class="bold">Conversation -</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit tempor incididunt ut labore ....
					</div>
				</div>
				<div class="large-2 medium-12 small-12 columns">
					<div class="message-date float-right">
						19 Oct
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row border-image">
		<div class="messages-actions message">
			<div class="check-wrap">
				<input type="checkbox" id="msg8">
				<label for="msg8">msg8</label>
			</div>
			<div class="ov-special-wrap">
				<div class="large-10 medium10 small-12 columns">
					<div class="sender">
						<span>Admin</span>
					</div>
					<div class="message-data">
						<span class="bold">Lorem ipsum dolor sit amet, consectetur adipiscing elit -</span> Tempor incididunt ut labore et dolore ....
					</div>
				</div>
				<div class="large-2 medium-12 small-12 columns">
					<div class="message-date float-right">
						9.30pm, 20 Oct
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row border-image">
		<div class="messages-actions message">
			<div class="check-wrap">
				<input type="checkbox" id="msg9">
				<label for="msg9">msg9</label>
			</div>
			<div class="ov-special-wrap">
				<div class="large-10 medium10 small-12 columns">
					<div class="sender">
						<img src="images/msg-user/tan-zi-wei.png"> Tan Zi Wei
					</div>
					<div class="message-data">
						<span class="bold">Conversation -</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit tempor incididunt ut labore ....
					</div>
				</div>
				<div class="large-2 medium-12 small-12 columns">
					<div class="message-date float-right">
						19 Oct
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row border-image">
		<div class="messages-actions message">
			<div class="check-wrap">
				<input type="checkbox" id="msg10">
				<label for="msg10">msg10</label>
			</div>
			<div class="ov-special-wrap">
				<div class="large-10 medium10 small-12 columns">
					<div class="sender">
						<span>Admin</span>
					</div>
					<div class="message-data">
						<span class="bold">Lorem ipsum dolor sit amet, consectetur adipiscing elit -</span> Tempor incididunt ut labore et dolore ....
					</div>
				</div>
				<div class="large-2 medium-12 small-12 columns">
					<div class="message-date float-right">
						9.30pm, 20 Oct
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row border-image">
		<div class="messages-actions message">
			<div class="check-wrap">
				<input type="checkbox" id="msg11">
				<label for="msg11">msg11</label>
			</div>
			<div class="ov-special-wrap">
				<div class="large-10 medium10 small-12 columns">
					<div class="sender">
						<img src="images/msg-user/tan-zi-wei.png"> Tan Zi Wei
					</div>
					<div class="message-data">
						<span class="bold">Conversation -</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit tempor incididunt ut labore ....
					</div>
				</div>
				<div class="large-2 medium-12 small-12 columns">
					<div class="message-date float-right">
						19 Oct
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row border-image">
		<div class="messages-actions message">
			<div class="check-wrap">
				<input type="checkbox" id="msg12">
				<label for="msg12">msg12</label>
			</div>
			<div class="ov-special-wrap">
				<div class="large-10 medium10 small-12 columns">
					<div class="sender">
						<span>Admin</span>
					</div>
					<div class="message-data">
						<span class="bold">Lorem ipsum dolor sit amet, consectetur adipiscing elit -</span> Tempor incididunt ut labore et dolore ....
					</div>
				</div>
				<div class="large-2 medium-12 small-12 columns">
					<div class="message-date float-right">
						9.30pm, 20 Oct
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row border-image">
		<div class="messages-actions message">
			<div class="check-wrap">
				<input type="checkbox" id="msg13">
				<label for="msg13">msg13</label>
			</div>
			<div class="ov-special-wrap">
				<div class="large-10 medium10 small-12 columns">
					<div class="sender">
						<img src="images/msg-user/tan-zi-wei.png"> Tan Zi Wei
					</div>
					<div class="message-data">
						<span class="bold">Conversation -</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit tempor incididunt ut labore ....
					</div>
				</div>
				<div class="large-2 medium-12 small-12 columns">
					<div class="message-date float-right">
						19 Oct
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- read -->
	<div class="row border-image">
		<div class="messages-actions message">
			<div class="check-wrap">
				<input type="checkbox" id="msg14">
				<label for="msg14">msg14</label>
			</div>
			<div class="ov-special-wrap">
				<div class="large-10 medium10 small-12 columns">
					<div class="sender">
						<span>Admin</span>
					</div>
					<div class="message-data">
						<span class="bold">Lorem ipsum dolor sit amet, consectetur adipiscing elit -</span> Tempor incididunt ut labore et dolore ....
					</div>
				</div>
				<div class="large-2 medium-12 small-12 columns">
					<div class="message-date float-right">
						9.30pm, 20 Oct
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row border-image">
		<div class="messages-actions message">
			<div class="check-wrap">
				<input type="checkbox" id="msg15">
				<label for="msg15">msg15</label>
			</div>
			<div class="ov-special-wrap">
				<div class="large-10 medium10 small-12 columns">
					<div class="sender">
						<img src="images/msg-user/tan-zi-wei.png"> Tan Zi Wei
					</div>
					<div class="message-data">
						<span class="bold">Conversation -</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit tempor incididunt ut labore ....
					</div>
				</div>
				<div class="large-2 medium-12 small-12 columns">
					<div class="message-date float-right">
						19 Oct
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row border-image">
		<div class="messages-actions message">
			<div class="check-wrap">
				<input type="checkbox" id="msg16">
				<label for="msg16">msg16</label>
			</div>
			<div class="ov-special-wrap">
				<div class="large-10 medium10 small-12 columns">
					<div class="sender">
						<span>Admin</span>
					</div>
					<div class="message-data">
						<span class="bold">Lorem ipsum dolor sit amet, consectetur adipiscing elit -</span> Tempor incididunt ut labore et dolore ....
					</div>
				</div>
				<div class="large-2 medium-12 small-12 columns">
					<div class="message-date float-right">
						9.30pm, 20 Oct
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row border-image">
		<div class="messages-actions message">
			<div class="check-wrap">
				<input type="checkbox" id="msg17">
				<label for="msg17">msg17</label>
			</div>
			<div class="ov-special-wrap">
				<div class="large-10 medium10 small-12 columns">
					<div class="sender">
						<img src="images/msg-user/tan-zi-wei.png"> Tan Zi Wei
					</div>
					<div class="message-data">
						<span class="bold">Conversation -</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit tempor incididunt ut labore ....
					</div>
				</div>
				<div class="large-2 medium-12 small-12 columns">
					<div class="message-date float-right">
						19 Oct
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row border-image">
		<div class="messages-actions message">
			<div class="check-wrap">
				<input type="checkbox" id="msg18">
				<label for="msg18">msg18</label>
			</div>
			<div class="ov-special-wrap">
				<div class="large-10 medium10 small-12 columns">
					<div class="sender">
						<img src="images/msg-user/tan-zi-wei.png"> Tan Zi Wei
					</div>
					<div class="message-data">
						<span class="bold">Conversation -</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit tempor incididunt ut labore ....
					</div>
				</div>
				<div class="large-2 medium-12 small-12 columns">
					<div class="message-date float-right">
						19 Oct
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row border-image">
		<div class="messages-actions message">
			<div class="check-wrap">
				<input type="checkbox" id="msg19">
				<label for="msg19">msg19</label>
			</div>
			<div class="ov-special-wrap">
				<div class="large-10 medium10 small-12 columns">
					<div class="sender">
						<img src="images/msg-user/tan-zi-wei.png"> Tan Zi Wei
					</div>
					<div class="message-data">
						<span class="bold">Conversation -</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit tempor incididunt ut labore ....
					</div>
				</div>
				<div class="large-2 medium-12 small-12 columns">
					<div class="message-date float-right">
						19 Oct
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row border-image">
		<div class="messages-actions message">
			<div class="check-wrap">
				<input type="checkbox" id="msg20">
				<label for="msg20">msg20</label>
			</div>
			<div class="ov-special-wrap">
				<div class="large-10 medium10 small-12 columns">
					<div class="sender">
						<img src="images/msg-user/tan-zi-wei.png"> Tan Zi Wei
					</div>
					<div class="message-data">
						<span class="bold">Conversation -</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit tempor incididunt ut labore ....
					</div>
				</div>
				<div class="large-2 medium-12 small-12 columns">
					<div class="message-date float-right">
						19 Oct
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!--popup-container-->
<div class="small-12 medium-6 align-center reveal-modal" id="special_announcement" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
	<div class="action close" data-close aria-label="Close modal">Close <span class="fa fa-times"></span></div>
	<div class="popup-container">
		<div class="row">
			<div class="small-12 medium-12 column">

				<div class="row" style="position: relative;">
					<div class="small-5 medium-5 columns  bg-gray">
						<h6>Special Announcement</h6>
						<h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit</h3>
						<div class="date-wrap">
							<label>Date:</label>
							<div class="date-data">Thu, 20 Oct 2018<br>11:30 pm</div>
						</div>

						<div class="small-12  medium-12 delete-list">
							<i class="fa fa-trash" aria-hidden="true"></i> Delete
						</div>
					</div>
					<div class="small-7 medium-7 columns">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

						<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

						<p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.</p>
					</div>
				</div><!--row-->
			</div>
		</div>
	</div><!--popup-container-->
</div>
<!--popup-container-->
<?php include("includes/footer.php"); ?>
<?php include("includes/scripts.php"); ?>