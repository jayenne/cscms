<?php


namespace App\Presenters;

use Laracasts\Presenter\Presenter;
use Carbon\Carbon;
use Lang;

class PagePresenter extends Presenter
{
    
    /*
     *
     * RETURNS - A formated title indicating it is subordinate.
     *
     */

    public function indentedTitle()
    {
        $padding = '';
        if ($this->depth > 0) {
            $padding = str_repeat("&nbsp;", $this->depth * 4).'<i class="fas fa-level-up-alt" data-fa-transform="rotate-90"></i>'."&nbsp;&nbsp;";
        }
        return $padding.$this->title;
    }

    public function titleNav()
    {
        if ($this->title_nav) {
            return $this->title_nav;
        }
        return $this->title;
    }

    /*
     *
     * RETURNS - A class to style dropdown's if they have a child.
     *
     */
     
    public function dropdownClass()
    {
        return $this->children->count() ? 'dropdown' : '';
    }

    /*
     *
     * RETURNS - A string, of  select option from a given obj .
     *
     */
    public function makeOptions($obj)
    {
        
        $str = '';
        
        foreach ($obj as $key => $val) {
            $str .= '<option value="'. $key .'">';
            
            $str .= $val;
    
            $str .= '<option>';
        }
        
        return $str;
    }
        
    /**
     *
     * RETURNS - A class to colour the backbround of the switch based on the live date and live status.
     * Grey is for no date or not set to go live.
     * Amber means it will go live once the given future date has been met
     * Green is live on the site now.
     *
     */
    
    public function pageStatus()
    {
                
        $now = \Carbon\Carbon::now();
        
        if ($this->status == '0') {
            return 'pending';
        } else if ($this->publish_off !== null && $this->publish_off < $now) {
            return 'expired';
        } else if ($this->status == '1' && $this->approved_on <= $now && $this->published == '1' && $this->publish_on <= $now) {
            return 'live';
        } else if ($this->published == '1' && $this->publish_on >= $now && $this->approved_on <= $now) {
            return 'scheduled';
        } else if ($this->published == '1' && $this->publish_on != null && $this->status == '0' && $this->approved_on == null) {
            return 'pending';
        } else if ($this->published == null && $this->publish_on != null) {
            return 'unpublished';
        } else if ($this->publish_on == null) {
            return 'undated';
        }
        
        return 'dead';
    }
    
    public function isLive()
    {
        
        $status = $this->pageStatus();
        
        if ($status == 'live') {
            return true;
        }
        
        return false;
    }
    
    public function isLiveToIcon()
    {
        
        $status = $this->isLive();
        
        if ($status == 'live') {
            return 'fa-eye';
        }
        
        return 'fa-eye-slash';
    }
    
    public function statusToClass()
    {
        
        $status = $this->pageStatus();
        
        //return $status;
                    
        switch ($status) {
            case 'live':
                return 'success';
                break;
            
            case 'scheduled':
                return 'secondary';
                break;
                    
            case 'pending':
                return 'warning';
                break;

            case 'unpublished':
                return 'danger';
                break;
                
            case 'undated':
                return 'light';
                break;
                
            default:
                return 'info';
        }
    }
    
    public function getTTLString($date)
    {
        $days = Carbon::parse($date)->diffInDays();
        $hours = Carbon::parse($date)->diffInHours();
        $mins = Carbon::parse($date)->diffInMinutes();
        
        if ($hours < 1) {
            $suffix = Lang::get('admin.time_suffix_minutes');
            return $mins.' '.$suffix;
        } else if ($days < 1) {
            $suffix = Lang::get('admin.time_suffix_hours');
            return $hours.' '.$suffix;
        }
        
        $suffix = Lang::get('admin.time_suffix_days');
        return $days.' '.$suffix;
    }
    
    public function pageStatusTip()
    {
        
        $status = $this->pageStatus();
        
        $date = $this->getTTLString($this->publish_on);
                    
        switch ($status) {
            case 'live':
                return Lang::get('admin.tip_page_status_live');
                break;
            //@lang( 'admin.tip_page_status_scheduled',['1'=>'foo'] )
            case 'scheduled':
                return Lang::get('admin.tip_page_status_scheduled', ['1'=>"$date"]);
                break;
                    
            case 'pending':
                return Lang::get('admin.tip_page_status_pending');
                break;

            case 'unpublished':
                return Lang::get('admin.tip_page_status_unpublished');
                break;
                
            case 'undated':
                return Lang::get('admin.tip_page_status_undated');
                break;
                
            default:
                return Lang::get('admin.tip_page_status_error');
        }
    }

    /* FRONTEND SPECIFIC PRESENTERS */
    
    public function navLink()
    {
                
        if ($this->redirect) {
            return $this->redirect;
        }
        
        return $this->slug;
    }
    
    public function navLinkTarget()
    {
                
        
        if ($this->target === 1) {
            return 'target=_blank';
        }
        
        return;
    }
    
    public function navActiveClass($active)
    {
                
        if ($this->slug == $active) {
            return 'active';
        }
    }
}
