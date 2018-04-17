<?php

// This class was generated on Mon, 16 Apr 2018 19:32:32 UTC by version 0.1.0-dev+560365 of Braintree SDK Generator
// DisputeProvideEvidenceRequest.php
// @version 0.1.0-dev+560365
// @type request
// @data H4sIAAAAAAAC/7xW33Pbtg9///4VOH730NzJlrutXec3t3ESd2ni2e52uywX0xJs8UKRKkEm9Xr533cQpdiO03Y/cnvxWSDwAT4ACPCTOJMlir7IFVXBY7dy9kbl2EH+NRmKRBwiZU5VXlkj+mIcFQhaDVhaBxIagAQWaxgddmEAJbqskMZDJg00uLtWjQ3BrfIF+ALh99DrfZdlNsf6H/46GM1GZ8dXR+eTq+nw9HQ4uZoMp+Pzs+kwqqYbXSAvfSC4LZRGyAJ5W6Kjp3L/+v1vf8F7F4atC/a7QJDs3C7BLiFHrW7QrcG6jdDhMpgccpuFEo3nM2M9UsJEsqKGUSbTIUfQdkWc2n3Ee/NGlUCCdzK7VmYFJpQLdE1i5Oddb9k2R1zJWcHp0treMpYLmhWqSq/B243tkrH9uuJDkwOpP5D6MUtBxxTFL63iF8MSao2uphgqbWUOoWLU5z1495ojZFRqOiyThN0m7y3ILuTI5OpG5UHqxrAM5LkGVMrakS+kgRfw7vWXcerQQlVZ5zGPzJbWldITSIfwdnycwPHoKIHx2XFS0x0fHj0Ome6SX7i0cWGhlNcIvlAEDj8EJJ8AVZip5bruxaY7YXQIytSS95NRzO2W1n1DNzpvp+dnLR4sbL7uikT8HNCtx9LJEj06Ev2Ly0ScoMzRPZQeWVfuyD6J2briCcFpEIn4RTolFxqbubE1J37CdSPcGxqDmMT6nrUWHNjAObmO+L1ETFDm50avRX8pNSELPgTlMBd97wImPHsqdF4hib4JWt9dJmIsffF4wOSdMqv9kJvEXqn8y0FzF4wOuQu3y8G9GC+mt0BhUSr/1JQmsXwRhIUsosoawii7pzgNC2Jl42GQcdi0T/fLJLcQZET4WyQawTaLTQFOlbmGbXd7sWllrmknwFbyoH8MSA4pDq06Ox2HWvL1vDgZzIbngynUppfP0txmlMpKpYX0aCV16oP04AGxl/+c2Oc6q3C43GHTCPb7KrNlpdEjeOlW6OH95LQLm5mA0LLLpNYJqy+UiScl+sLm7c5SBBc8F2ZYVmzRiYPKY375rPC+on6aems1dRX6Zde6VVr4Uqdumb188UPvoM5aF47qjYSdytkMiZRZJfdLh53Ov5knMH82j9NufjCHrJBOZnzn4oaYM9c5KKr1r3ENbV2YqzXcYb6QPpaJx3mTgsgx8pF8o9p+ZPG/bcb6SiVfLVzM6U7p7kX7xTuZzcZtGVzjnafBo8X7jxg41Dvhx+/92C84/TFAZU29sL/aKC9+fPXq/4T1eOh8f9A+TAjdDW97Xvg8KOOWrvHrQgcjy4VaBRtIryGvQ1lg7A/CUhqvMmrHa2zDKSJc1GNj0kRIm+hub2+7ShpZxyaJ1Mrwy4NStu20lB5+dj8yjYMnKcPl3eVdIt5Y49E041mUQXtVSefTpuoiESfeV+9i//TF+Hw6E3FPib5Ib56n7dM0bR+g6afNTrpLH3mCT69VdR/W8GOFmcd8Wj8439gcRf/bXu/uf38CAAD//w==
// DO NOT EDIT

namespace PayPal\v1\CustomerDisputes;

use BraintreeHttp\HttpRequest;

class DisputeProvideEvidenceRequest extends HttpRequest
{
    function __construct($disputeId)
    {
        parent::__construct("/v1/customer/disputes/{dispute_id}/provide-evidence?", "POST");
        
        $this->path = str_replace("{dispute_id}", urlencode($disputeId), $this->path);
        $this->headers["Content-Type"] = "multipart/form-data";
    }
}
