<?php

namespace App\Http\Controllers;
use App\Models\Member;
use App\Models\Ukssmem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LiveSearchController extends Controller
{
    // function index() {
    //     return view('livesearch');
    // }

    // function action(Request $request) 
    // {
    //     $user = Auth::user();
    //     if ($request->ajax()) {
    //         $output = '';
    //         $query = $request->get('query');
    //         if ($query != '') {

    //             $existingMemberIds = Ukssmem::where('church_id', $user->church_id)->pluck('member_id');
    //             $data = Member::where('church_id', $user->church_id)
    //                 ->whereNotIn('id', $existingMemberIds)
    //                 ->where('name', 'like', '%' . $query . '%')
    //                 ->get();
                
    //             // Log::info($existingMemberIds);
                
    //         } else {
    //             // $data = DB::table('members')
    //             // ->orderBy('name')->get();
    //             $existingMemberIds = Ukssmem::where('church_id', $user->church_id)->pluck('member_id');
    //             $data = DB::table('members')->where('church_id', $user->church_id)->whereNotIn('id', $existingMemberIds)
    //             ->orderBy('name')->get()->all();
    //         }
    //         // Log::info($data);
    //         $total_row = $data->count();

    //         if($total_row > 0) {
    //             foreach($data as $row)
    //             {
    //                 $output .= '
    //                 <tr>
    //                     <td>
    //                         <input class="form-check-input" type="checkbox" name="member_ids[]" value="' . $row->id . '" id="member_' . $row->id . '">
    //                         <label class="form-check-label" for="member_' . $row->id . '">
    //                             ' . $row->name . '
    //                         </label>
    //                     </td>
    //                 </tr>
    //                 ';
                    
    //             } 
                
    //         }else {
    //             $output = '
    //             <tr>
    //                 <td align="center"> No Data Found</td>
    //             </tr>
    //             ';
    //         }

    //         $data = array (
    //             'table_data' => $output,
    //             'total_data' => $total_row
    //         );

    //         echo json_encode($data);
    //     }
    // }

    function action(Request $request)
{
    $user = Auth::user();

    if ($request->ajax()) {
        $query = $request->get('query');
        $output = '';
        $total_row = 0;

        if ($query != '') {
            list($data, $total_row) = $this->getDataWithQuery($user, $query);
        } else {
            list($data, $total_row) = $this->getDataWithoutQuery($user);
        }

        if ($total_row > 0) {
            $output = $this->generateTableRows($data);
        } else {
            $output = '<tr><td align="center"> No Data Found</td></tr>';
        }

        $responseData = [
            'table_data' => $output,
            'total_data' => $total_row
        ];

        echo json_encode($responseData);
    }
}

protected function getDataWithQuery($user, $query)
{
    $existingMemberIds = Ukssmem::where('church_id', $user->church_id)->pluck('member_id');
    $data = Member::where('church_id', $user->church_id)
        ->whereNotIn('id', $existingMemberIds)
        ->where('name', 'like', '%' . $query . '%')
        ->get();

    return [$data, $data->count()];
}

protected function getDataWithoutQuery($user)
{
    $existingMemberIds = Ukssmem::where('church_id', $user->church_id)->pluck('member_id');
    $data = DB::table('members')
        ->where('church_id', $user->church_id)
        ->whereNotIn('id', $existingMemberIds)
        ->orderBy('name')
        ->get()
        ->all();

    return [$data, count($data)];
}

protected function generateTableRows($data)
{
    $output = '';

    foreach ($data as $row) {
        $output .= '
            <tr>
                <td>
                    <input class="form-check-input" type="checkbox" name="member_ids[]" value="' . $row->id . '" id="member_' . $row->id . '">
                    <label class="form-check-label" for="member_' . $row->id . '">
                        ' . $row->name . '
                    </label>
                </td>
            </tr>
        ';
    }

    return $output;
}

}
