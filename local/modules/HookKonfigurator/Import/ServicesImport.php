<?php

namespace HookKonfigurator\Import;

use Thelia\Core\FileFormat\Formatting\FormatterData;
use Thelia\Core\FileFormat\FormatType;
use Thelia\ImportExport\Import\ImportHandler;
use Thelia\Model\ProductSaleElementsQuery;

/**
 * Class ServiceImport
 * @package HookKonfigurator\Import
 * @author Emanuel Plopu <emanuel.plopu@sepa.at>
 */
class ServicesImport extends ImportHandler
{
    /**
     * @param \Thelia\Core\FileFormat\Formatting\FormatterData
     * @return string|array error messages
     *
     * The method does the import routine from a FormatterData
     */
    public function retrieveFromFormatterData(FormatterData $data)
    {
        $errors = [];
      /*  $log = Tlog::getInstance ();
        $log->debug(" service_import ");*/
        $i = 0;
        while (null !== $row = $data->popRow()) {
           
     //   	$log->debug($i.implode(" ",$row));
		   
		   
		   
		   /**
             * Check for mandatory columns
             */
            $this->checkMandatoryColumns($row);

            $obj = ProductSaleElementsQuery::create()->findPk($row["id"]);

            if ($obj === null) {
                $errors[] = $this->translator->trans(
                    "The product sale element reference %id doesn't exist",
                    [
                        "%id" => $row["id"]
                    ]
                );
            } else {
                $obj->setQuantity($row["stock"]);

                if (isset($row["ean"]) && !empty($row["ean"])) {
                    $obj->setEanCode($row["ean"]);
                }

                $obj->save();
                $this->importedRows++;
            }
        }

        return $errors;
    }

    protected function getMandatoryColumns()
    {
        return ["id", "ref"];
    }

    /**
     * @return string|array
     *
     * Define all the type of import/formatters that this can handle
     * return a string if it handle a single type ( specific exports ),
     * or an array if multiple.
     *
     * Thelia types are defined in \Thelia\Core\FileFormat\FormatType
     *
     * example:
     * return array(
     *     FormatType::TABLE,
     *     FormatType::UNBOUNDED,
     * );
     */
    public function getHandledTypes()
    {
        return array(
            FormatType::TABLE,
            FormatType::UNBOUNDED,
        );
    }
}
