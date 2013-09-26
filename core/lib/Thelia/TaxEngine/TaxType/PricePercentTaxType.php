<?php
/*************************************************************************************/
/*                                                                                   */
/*      Thelia	                                                                     */
/*                                                                                   */
/*      Copyright (c) OpenStudio                                                     */
/*      email : info@thelia.net                                                      */
/*      web : http://www.thelia.net                                                  */
/*                                                                                   */
/*      This program is free software; you can redistribute it and/or modify         */
/*      it under the terms of the GNU General Public License as published by         */
/*      the Free Software Foundation; either version 3 of the License                */
/*                                                                                   */
/*      This program is distributed in the hope that it will be useful,              */
/*      but WITHOUT ANY WARRANTY; without even the implied warranty of               */
/*      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the                */
/*      GNU General Public License for more details.                                 */
/*                                                                                   */
/*      You should have received a copy of the GNU General Public License            */
/*	    along with this program. If not, see <http://www.gnu.org/licenses/>.         */
/*                                                                                   */
/*************************************************************************************/
namespace Thelia\TaxEngine\TaxType;

use Thelia\Type\FloatType;

/**
 *
 * @author Etienne Roudeix <eroudeix@openstudio.fr>
 *
 */
class PricePercentTaxType extends BaseTaxType
{
    public function calculate($untaxedPrice)
    {
        return $untaxedPrice * $this->getRequirement("percent") * 0.01;
    }

    public function pricePercentRetriever()
    {
        return ($this->getRequirement("percent") * 0.01);
    }

    public function fixAmountRetriever()
    {
        return 0;
    }

    public function getRequirementsList()
    {
        return array(
            'percent' => new FloatType(),
        );
    }
}

//600 / (1 + 0,10 + 0,10)  =/= 600 / (1 + 0,10 ) + 600 / (1 + 0,10 )