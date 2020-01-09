<?php

		  namespace App\Http\Controllers\Crest;

		  use App\Models\Crest\project;
		  use App\Models\Crest\proposal;
		  use App\Models\Crest\event;
		  use Illuminate\Http\Request;
		  use Calendar;
		  use App\Http\Controllers\Controller;
		  use Illuminate\Support\Facades\Auth;
		  use Illuminate\Support\Facades\DB;

		  class CalendarController extends Controller
		  {
					public function admin() {
							  $proposals = proposal::all();
							  $events = [];
							  if($proposals) {
										foreach ($proposals as $key => $value) {
												  $project = project::find($value->project_id);
												  $events[] = Calendar::event(
															$project->title,
															true,
															new \DateTime($project->need_bid_by_date),
															new \DateTime($project->need_bid_by_date.' +1 day'),
															null,
															[
																	  'color' => '#f05050',
																	  'url' => '/project-room/show/'.$project->id,
															]
												  );
										}
							  }

							  $user_events = DB::table('events')->get();

							  foreach($user_events as $user_event) {
										$events[] = Calendar::event(
												  $user_event->title,
												  true,
												  new \DateTime($user_event->date),
												  new \DateTime($user_event->date.' +1 day'),
												  null,
												  [
															'color' => 'green',
															'url' => '/calendar/show/'.$user_event->id,
												  ]
										);
							  }

							  $calendar = Calendar::addEvents($events);

							  return view('calendar.admin', compact('calendar'));
					}


					public function index() {
							  $proposals = proposal::where('created_by', Auth::Id())->get();
							  $events = [];
							  if($proposals) {
										foreach ($proposals as $key => $value) {
												  $project = project::find($value->project_id);
												  $events[] = Calendar::event(
															$project->title,
															true,
															new \DateTime($project->need_bid_by_date),
															new \DateTime($project->need_bid_by_date.' +1 day'),
															null,
															[
																	  'color' => '#f05050',
																	  'url' => '/project-room/show/'.$project->id,
															]
												  );
										}
							  }

							  $user_events = DB::table('events')->where('created_by', Auth::Id())->get();

							  foreach($user_events as $user_event) {
										$events[] = Calendar::event(
												  $user_event->title,
												  true,
												  new \DateTime($user_event->date),
												  new \DateTime($user_event->date.' +1 day'),
												  null,
												  [
															'color' => 'green',
															'url' => '/calendar/show/'.$user_event->id,
												  ]
										);
							  }

							  $calendar = Calendar::addEvents($events);

							  return view('calendar.public', compact('calendar'));
					}

					public function event(Request $request) {
							  $id = DB::table('events')->insertGetId([
																			   'title'	=> $request->title,
																			   'description'	=> $request->description,
																			   'date'	=> $request->date,
																			   'link'	=> $request->link,
																			   'created_by'	=> Auth::Id()
																	 ]);
							  if($request->hasFile('event_file')) {
										$image      = $request->file('event_file');
										$originName = $image->getClientOriginalName();
										$fileName   = str_replace(' ', '_', time() . ' ' . $originName);
										$request->file('event_file')->storeAs('public/events/images', $fileName);
										$filePath = 'events/images/' . $fileName;

										DB::table('events')->where('id', $id)->update(['image' => $filePath]);

							  }
							  return redirect('/calendar');
					}

					public function show($id) {
							  $event = event::find($id);
							  return view('calendar.show', compact('event'));
					}

					public function delete($id) {
							  event::find($id)->delete();
							  return redirect('/calendar');
					}
		  }
