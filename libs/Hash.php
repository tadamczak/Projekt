<?php
class Hash 
{
    
    /**
     * 
     * @param string $algo  Algorithm (md5, sha1, whirlpool etc.)
     * @param string $data  Data to encode
     * @param string $salt  Salt
     * @return string
     */
    
    function create($algo, $data, $salt) 
    {
        $context = hash_init($algo, HASH_HMAC, $salt);
        hash_update($context, $data);
        
        return hash_final($context);
    }
}