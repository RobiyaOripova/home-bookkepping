<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Accounting;
use App\Http\Requests\AccountingRequest;
use App\Http\Resources\UserResource;



class AccountingApiController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/accountings",
     *     tags={"Accountings"},
     *     summary="Get Accountings list",
     *
     *     @OA\Response (
     *          response=200,
     *          description="Successful operation"
     *     ),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *     ),
     *      security={
     *         {"token": {}}
     *     },
     * )
     */
    public function index()
    {

        return response()->json(['success' => true,'data'=>UserResource::collection(User::with("accounting")->get())]);

    }
    /**
     * @OA\Post(
     *     path="/api/accountings/store",
     *     tags={"Accountings"},
     *     summary="Accounting create",
     *     @OA\RequestBody (
     *         required=true,
     *         @OA\MediaType (
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 @OA\Property (
     *                    property="date",
     *                    type="string",
     *                 ),
     *                 @OA\Property (
     *                    property="type",
     *                    type="string",
     *                 ),
     *                 @OA\Property (
     *                    property="categories",
     *                    type="string",
     *                 ),
     *                 @OA\Property (
     *                    property="money",
     *                    type="float",
     *                 ),
     *                 @OA\Property (
     *                    property="comment",
     *                    type="string",
     *                 ),
     *
     *
     *             ),
     *         ),
     *     ),
     *     @OA\Response (
     *          response=200,
     *          description="Successful operation"
     *     ),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *     ),
     *   security={
     *     {"token": {}}
     *     },
     * )
     */

    public function store(AccountingRequest $request)
    {


        $data=$request->validated();
        $data["user_id"]=auth()->user()->id;


        $result = Accounting::create($data);

        if ($result)
            return response()->json([
                'message' => 'Created successfuly',
                'success' => true,
                'data' => $result
            ]);
        return response()->json([
            'message' => 'Something wrong',
            'success' => false,
        ]);


    }

    /**
     * @OA\Get(
     *     path="/api/accountings/{id}",
     *     tags={"Accountings"},
     *     summary="Get accounting by show ID",
     *     @OA\Parameter(
     *          in="path",
     *          name="id",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          ),
     *     ),
     *     @OA\Response (
     *          response=200,
     *          description="Successful operation"
     *     ),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *     ),
     *      security={
     *         {"token": {}}
     *     },
     * )
     */
    public function show( $id)
    {
        return  response()->json(['success' => true,'data'=> new UserResource(User::with("accounting")->findOrFail($id))]);

    }

    /**
     * @OA\Put(
     *     path="/api/change-accounting/{acc}",
     *     tags={"Accountings"},
     *     summary="Change accounting",
     *     @OA\Parameter (
     *          in="path",
     *          name="acc",
     *          required=true,
     *          @OA\Schema (
     *              type="string"
     *          )
     *     ),
     *     @OA\RequestBody (
     *         required=true,
     *         @OA\MediaType (
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 @OA\Property (
     *                    property="date",
     *                    type="string",
     *                 ),
     *                 @OA\Property (
     *                    property="type",
     *                    type="string",
     *                 ),
     *                 @OA\Property (
     *                    property="categories",
     *                    type="string",
     *                 ),
     *                 @OA\Property (
     *                    property="money",
     *                    type="float",
     *                 ),
     *                 @OA\Property (
     *                    property="comment",
     *                    type="string",
     *                 ),
     *             ),
     *         ),
     *     ),
     *     @OA\Response (
     *          response=200,
     *          description="Successful operation"
     *     ),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *     ),
     *     security={
     *         {"token": {}}
     *     },
     * )
     */
    public function update(AccountingRequest $request, Accounting $accounting)
    {
        $data=$request->validated();
       $data["user_id"]=auth()->user()->id;

      $accounting->update($data);
        return response()->json(['success' => true, 'message' => 'Successfully Updated', 'data' => $accounting]);

    }

    /**
     * @OA\DELETE(
     *     path="/api/accountings/{id}",
     *     tags={"Accountings"},
     *     summary="Delete Task",
     *     @OA\Parameter(
     *          in="path",
     *          name="id",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          ),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *     ),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *     ),
     *     security={
     *         {"token": {}}
     *     },
     * )
     */
    public function destroy(Accounting $accounting)
    {
       $accounting->delete();
        if ($accounting) {
            return response()->json([
                'success' => true,
                'message' => 'Successfully Deleted'
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Not Deleted'
        ], 404);
    }
}
