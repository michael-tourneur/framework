<?php

namespace Pagekit\Component\Auth\Encoder;

class NativePasswordEncoder implements PasswordEncoderInterface
{
    protected $cost = 10;
    protected $algorithm = PASSWORD_BCRYPT;

    /**
     * {@inheritdoc}
     */
    public function hash($raw, $salt = null)
    {
        $options = array('cost' => $this->cost);

        if (null !== $salt) {
            $options['salt'] = $salt;
        }

        return password_hash($raw, $this->algorithm, $options);
    }

    /**
     * {@inheritdoc}
     */
    public function verify($hash, $raw, $salt = null)
    {
        if (null !== $salt) {
            throw new \InvalidArgumentException('The salt needs to be included with the hash.');
        }

        return password_verify($raw, $hash);
    }
}
