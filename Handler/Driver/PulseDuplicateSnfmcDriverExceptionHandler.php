<?php


namespace Pulse\ExceptionBundle\Handler\Driver;

use Doctrine\DBAL\Exception\DriverException;
use Pulse\ExceptionBundle\Code;
use Pulse\ExceptionBundle\Exception\PulseExceptionInterface;

class PulseDuplicateSnfmcDriverExceptionHandler implements PulseExceptionInterface
{
    /**
     * @param \Exception $exception
     * @return array
     */
    public function setData(\Exception $exception)
    {

        return array(
            'message'      => 'La plage que vous voulez insérée existe déjà',
            'http_message' => 'Action non aboutie',
            'code' => Code::CODE_INTERNAL_ERROR
        );
    }

    /**
     * @param \Exception $exception
     * @return bool
     */
    public function isMatchException(\Exception $exception)
    {
        return $exception instanceof DriverException && $exception->getSQLState() == ConstantSrv::SQL_STATE_DUPLICATE_SNFMC_PLAGE;
    }

}