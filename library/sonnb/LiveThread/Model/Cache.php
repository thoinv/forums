<?php
/**
 * Product: sonnb - Live Threads
 * Version: 1.1.14
 * Date: 25th January 2015
 * Author: sonnb
 * Website: www.sonnb.com
 * License: You might not copy or redistribute this addon.
 * Any action to public or redistribute must be authorized from author
 */

class sonnb_LiveThread_Model_Cache extends XenForo_Model
{
    protected $options;
    public $cache;
    public $enable;
    public $duration;
    
    private $cacheTag = array('sonnb_LiveThread');
    
    public function __construct()
    {
        $this->options = XenForo_Application::get('options');
        
        $this->cache = XenForo_Application::getCache();
        
        if ($this->cache && $this->options->sonnb_LiveThread_Cache)
        {
            $this->enable = true;
        }
        
        $this->duration = $this->options->sonnb_LiveThread_CacheDuration;
    }
    
    public function load($cacheId)
    {
        if ($this->enable)
        {
            $data = $this->cache->load($cacheId);
            if ($data)
            {
                return @unserialize($data);
            }
        }
        
        return false;
    }
    
    public function save($cacheId, $cacheData)
    {
        if ($this->enable)
        {
            return $this->cache->save(serialize($cacheData), $cacheId, $this->cacheTag, $this->duration*60);
        }
        
        return false;
    }
    
    public function remove($cacheId)
    {
        if ($this->enable)
        {
            return $this->cache->remove($cacheId);
        }
        
        return false;
    }
    
    public function clean()
    {
        if ($this->enable)
        {
            return $this->cache->clean('matchingTag', $this->cacheTag);
        }
        
        return false;
    }
}

?>
