<?php namespace Learn\Http\Controllers;

use Illuminate\Http\Request;
use Learn\Http\Requests\FrontEnd\AddResourceRequest;
use Learn\Http\Requests;
use Learn\Models\Feedback;
use Learn\Services\EmailService;
use Learn\Services\MessageService;

class FeedbackController extends Controller {

    protected $feedback;
    protected $message;
    protected $emailService;

    function __construct(Feedback $feedback, MessageService $message, EmailService $emailService)
    {
        $this->feedback = $feedback;
        $this->message = $message;
        $this->emailService = $emailService;
    }

    /**
     * Display a listing of the feedback in the admin area.
     *
     * @return Response
     */
    public function adminIndex(Request $request)
    {
        $archived = $request->has('archived') && $request->get('archived') == 'true';
        $feedbacks = $this->feedback->where('archived', '=', $archived)->orderBy('created_at', 'desc')->paginate(50);
        return view('admin/feedback/index', ['feedbacks' => $feedbacks]);
    }

    /**
     * Shows a single feedback item.
     */
    public function adminShow($id)
    {
        $this->feedback = $this->feedback->find($id);
        return view('admin/feedback/show', ['feedback' => $this->feedback]);
    }

    /**
     * Remove the specified feedback from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function adminDestroy($id)
    {
        $this->feedback = $this->feedback->find($id);
        $this->feedback->delete();
        $this->message->success('Feedback about "' . $this->feedback->topic . '" has been deleted.');
        return redirect('/admin/feedback');
    }

    /**
     * Toggles the archived status of a feedback item.
     *
     * @param $id
     */
    public function toggleArchived($id)
    {
        $feedback = $this->feedback->find($id);
        $feedback->archived = !$feedback->archived;
        $feedback->save();
        return redirect('/admin/feedback/' . $id);
    }

    /**
     * Handles a resources submission request from the front end.
     *
     * @param AddResourceRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function submitResource(AddResourceRequest $request)
    {
        $this->feedback->email = $request->get('email');
        $this->feedback->topic = 'Resource Addition';
        $message = 'Resource link: ' . $request->get('extra-link') . "\n";
        $message .= 'Message: ' . $request->get('extra-message');
        $this->feedback->message = $message;
        $this->feedback->save();
        $this->emailService->sendAdminsNewFeedback($this->feedback);
        $this->message->success('Your resource submission was successfully sent.');
        return redirect('/submit');

    }

}
