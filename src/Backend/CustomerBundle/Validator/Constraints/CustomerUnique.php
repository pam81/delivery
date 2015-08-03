<?php 
namespace Backend\CustomerBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class CustomerUnique extends Constraint
{
    public $message = 'Ya existe el mismo nombre de usuario';
    
    public function validatedBy()
    {
        return 'customer_unique';
    }

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
    
    
}