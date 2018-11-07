<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Repositories\OrderRepository;
use App\Repositories\TypepaperRepository;
use App\Repositories\TypeformatRepository;
use App\Repositories\WordpageRepository;
use App\Repositories\AcademiclevelRepository;
use App\Repositories\DeadlineRepository;
use App\Repositories\UserslevelRepository;
use App\Repositories\ExtratserviceRepository;
use App\Repositories\TypeofworksRepository;
use App\Repositories\SubjectRepository;
use App\Repositories\StandarddeadlineRepository;
use App\Repositories\PayRepository;
use App\Repositories\StructureRepository;
use App\Repositories\UserRepository;


use App\Http\Requests\CreateMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Repositories\MessageRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Message;
use App\Models\User;

class MessageController extends AppBaseController
{
    /** @var  MessageRepository */
    private $messageRepository;
    /** @var  OrderRepository */
    private $orderRepository;
    private $typepaperRepository;
    private $typeformatRepository;
    private $wordpageRepository;
    private $academiclevelRepository;
    private $deadlineRepository;
    private $userslevelRepository;
    private $extratserviceRepository;
    private $typeofworksRepository;
    private $subjectRepository;
    private $standarddeadlineRepository;
    private $payRepository;
    private $structureRepository;
    private $userRepository;

    public function __construct(MessageRepository $messageRepo,
                                OrderRepository $orderRepo,
                                TypepaperRepository $typepaperRepository,
                                TypeformatRepository $typeformatRepository,
                                WordpageRepository $wordpageRepository,
                                AcademiclevelRepository $academiclevelRepository,
                                DeadlineRepository $deadlineRepository,
                                UserslevelRepository $userslevelRepository,
                                ExtratserviceRepository $extratserviceRepository,
                                TypeofworksRepository $typeofworksRepository,
                                SubjectRepository $subjectRepository,
                                StandarddeadlineRepository $standarddeadlineRepository,
                                PayRepository $payRepository,
                                UserRepository $userRepository,
                                StructureRepository $structureRepository)
    {
        $this->messageRepository = $messageRepo;
        $this->orderRepository = $orderRepo;
        $this->typepaperRepository = $typepaperRepository;
        $this->typeformatRepository = $typeformatRepository;
        $this->wordpageRepository = $wordpageRepository;
        $this->academiclevelRepository = $academiclevelRepository;
        $this->deadlineRepository = $deadlineRepository;
        $this->userslevelRepository = $userslevelRepository;
        $this->extratserviceRepository = $extratserviceRepository;
        $this->typeofworksRepository =  $typeofworksRepository;
        $this->subjectRepository =  $subjectRepository;
        $this->standarddeadlineRepository =  $standarddeadlineRepository;
        $this->payRepository =  $payRepository;
        $this->structureRepository =  $structureRepository;
        $this->userRepository =  $userRepository;
    }

    /**
     * Display a listing of the Message.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->messageRepository->pushCriteria(new RequestCriteria($request));
        $messages = $this->messageRepository->all();

        return view('messages.index')
            ->with('messages', $messages);
    }

    /**
     * Show the form for creating a new Message.
     *
     * @return Response
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created Message in storage.
     *
     * @param CreateMessageRequest $request
     *
     * @return Response
     */
    public function store(CreateMessageRequest $request)
    {
        $input = $request->all();

        $message = $this->messageRepository->create($input);

        Flash::success('Message saved successfully.');

        return redirect(route('messages.index'));
    }

    /**
     * Display the specified Message.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $message = $this->messageRepository->findWithoutFail($id);

        if (empty($message)) {
            Flash::error('Message not found');

            return redirect(route('messages.index'));
        }

        return view('messages.show')->with('message', $message);
    }

    /**
     * Show the form for editing the specified Message.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $message = $this->messageRepository->findWithoutFail($id);

        if (empty($message)) {
            Flash::error('Message not found');

            return redirect(route('messages.index'));
        }

        return view('messages.edit')->with('message', $message);
    }

    /**
     * Update the specified Message in storage.
     *
     * @param  int              $id
     * @param UpdateMessageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMessageRequest $request)
    {
        $message = $this->messageRepository->findWithoutFail($id);

        if (empty($message)) {
            Flash::error('Message not found');

            return redirect(route('messages.index'));
        }

        $message = $this->messageRepository->update($request->all(), $id);

        Flash::success('Message updated successfully.');

        return redirect(route('messages.index'));
    }

    /**
     * Remove the specified Message from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $message = $this->messageRepository->findWithoutFail($id);

        if (empty($message)) {
            Flash::error('Message not found');

            return redirect(route('messages.index'));
        }

        $this->messageRepository->delete($id);

        Flash::success('Message deleted successfully.');

        return redirect(route('messages.index'));
    }


    public function sendMessageUser(Request $request){
        $msg = new Message();

        $msg->user_id = $request->user_id;
        $msg->message = $request->msg;
        $msg->user_is_sender = true;
        $msg->save();

        $result = array(
            'statu' => 1,
            "msg" => $msg->message,
            "date" => date('d M. Y', strtotime($msg->created_at)).' at '.date('h:i A', strtotime($msg->created_at)),
        );

        return response()->json($result);
    }


    public function getLastMessage(Request $request){

        $msg = Message::where('user_id',  intval($request->user_id))->where('id', '>', $request->last_id_msg)->whereNotNull('admin_id')->get();

        $result = array();
        $result['msg'] = array();
        $result['last_id'] = 0;
        if(count($msg) > 0){
            $result['statu'] = 1;
            $i = 0;
            $last_id = 1;
            foreach($msg as $mg){
                $last_id = $mg->id;
                $result['msg'][$i] = array(
                    "msg" => $mg->message,
                    "name" => $mg->admin->name,
                    "date" => date('d M. Y', strtotime($mg->created_at)).' at '.date('h:i A', strtotime($mg->created_at)),
                );
                $i++;
            }
            $result['last_id'] = $last_id;
        }


        return response()->json($result);
    }

    public  function messageView($user_id){
        if($user_id > 0){
            $user = $this->userRepository->find($user_id);
            //dd($user->id);
            if($user){
                //$msg = Message::where('user_id', $user->id)->get();
                return view('users.Admin.messages')->with('menu', 2)
                    ->with('users', $this->userRepository->all())
                    ->with('user', $user);
            }
        }
        return view('users.Admin.messages')->with('menu', 2)
            ->with('users', $this->userRepository->all());
    }


    public function sendMessageAdmin(Request $request){
        $msg = new Message();

        $msg->user_id = $request->user_id;
        $msg->admin_id = $request->admin;
        $msg->message = $request->msg;
        $msg->user_is_sender = false;
        $msg->save();

        $result = array(
            'statu' => 1,
            "msg" => $msg->message,
            "date" => date('d M. Y', strtotime($msg->created_at)).' at '.date('h:i A', strtotime($msg->created_at)),
        );

        return response()->json($result);
    }

    public function getLastMessageUser(Request $request){

        $msg = Message::where('user_id',  $request->user_id)->where('id', '>', $request->last_id_msg)->whereNull('admin_id')->get();

        $result = array();
        $result['msg'] = array();
        $result['last_id'] = 0;
        if(count($msg) > 0){
            $result['statu'] = 1;
            $avatar = '';
            if(!is_null($msg[0]->user->avatar) && $msg[0]->user->avatar != "")
                $avatar = asset("images/avatars/".$msg[0]->user->avatar);
            else
                if($msg[0]->user->sexe != "feminin")
                    $avatar = asset("images/avatars/default_male.png");
                else
                    $avatar = asset("images/avatars/default_female.png");
            $result['avatar'] = $avatar;
            $i = 0;
            $last_id = 0;
            foreach($msg as $mg){
                $last_id = $mg->id;
                $result['msg'][$i] = array(
                    "msg" => $mg->message,
                    "name" => $mg->user->name,
                    "date" => date('d M. Y', strtotime($mg->created_at)).' at '.date('h:i A', strtotime($mg->created_at)),
                );
                $i++;
            }
            $result['last_id'] = $last_id;
        }


        return response()->json($result);
    }

    public function chargerMessageUser(Request $request){

        $msg = Message::where('user_id',  $request->user_id)->get();
        $user = User::find($request->user_id);
        $result = array();
        $result['msg'] = array();
        $result['last_id'] = 0;
        $result['user_name'] = ($user) ? ((!is_null($user->name)) ? $user->name : $user->email) : '';

        if(count($msg) > 0){
            $result['statu'] = 1;
            //$result['user_name'] = (!is_null($msg[0]->user->name)) ? $msg[0]->user->name : $msg[0]->user->email;
            $i = 0;
            $last_id = 0;
            foreach($msg as $mg){
                $last_id = $mg->id;
                $avatar = '';
                if(!is_null($mg->user->avatar) && $mg->user->avatar != "")
                    $avatar = asset("images/avatars/".$mg->user->avatar);
                else
                    if($mg->user->sexe != "feminin")
                        $avatar = asset("images/avatars/default_male.png");
                    else
                        $avatar = asset("images/avatars/default_female.png");
                $result['msg'][$i] = array(
                    "msg" => $mg->message,
                    "is_user" => $mg->user_is_sender,
                    "avatar" => $avatar,
                    "name" => $mg->user->name,
                    "date" => date('d M. Y', strtotime($mg->created_at)).' at '.date('h:i A', strtotime($mg->created_at)),
                );
                $i++;
            }

            $result['last_id'] = $last_id;
        }

        $result['files'] = array();
        foreach($user->files as $f){
            $result['files'][] = [
                'url' => asset($f->emplacement.'/'.$f->physical_name),
                'class' => ($f->iAmSender($user->id) ? '' : 'admin'),
                'nom' => $f->nom,
                'proprietaire' => ($f->iAmSender($user->id) ? $f->user->name : 'admin : '.$f->admin->name),
            ];
        }


        return response()->json($result);
    }


}
