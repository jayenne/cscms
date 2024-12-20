<?php

namespace App\Http\Controllers;

use App\Models\User;
//use Raju\Streamer\Helpers\VideoStream;
use App\Models\VideoViews;
use Auth;
use Illuminate\Http\Request;

class StreamController extends Controller
{
    public function exportcsv(Request $request)
    {
        $canExport = Auth::user()->isAdminOrEditor();
        if ($canExport == false) {
            return redirect()->route('login');
            //return abort(404);
        }

        $filename = 'video-views-'.date('YmdHis').'.csv';
        $views = VideoViews::all();
        $headers = [
            'Content-type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=$filename",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        $columns = ['File', 'User', 'Time', 'Completed', 'First Viewed', 'Last Viewed'];

        $callback = function () use ($views, $columns) {
            $file = fopen('php://output', 'w');
            // add headings
            fputcsv($file, $columns);
            // add data
            foreach ($views as $view) {
                $row['File'] = $view->filename;
                $row['User'] = User::whereId($view->user_id)->first()->username;
                $row['Time'] = $view->time;
                $row['Completed'] = $view->end;
                $row['First Viewed'] = $view->created_at;
                $row['Last Viewed'] = $view->updated_at;

                fputcsv($file, [$row['File'], $row['User'], $row['Time'], $row['Completed'], $row['First Viewed'], $row['Last Viewed']]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function logview(Request $request)
    {
        $user = Auth::user();
        if ($user->hasRole('member')) {
            $video = VideoViews::where('user_id', $user->id)->where('filename', $request->filename);
            $response = $video->updateOrCreate(
                [
                    'filename' => $request->filename,
                    'user_id' => $user->id,
                ],
                [
                    'time' => $request->time ?? 0,
                    'end' => $request->completed ?? false,
                ]
            );
        }

        return response($response, 200);
    }
}
