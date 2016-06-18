<?php

namespace HookScraper\Controller;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Thelia\Controller\Admin\BaseAdminController;
use Thelia\Core\Event\File\FileCreateOrUpdateEvent;
use Thelia\Core\Event\TheliaEvents;
use Thelia\Core\Security\AccessManager;
use Thelia\Core\Security\Resource\AdminResources;
use Thelia\Form\Exception\FormValidationException;
use Thelia\Model\Lang;
use Thelia\Model\LangQuery;
use Thelia\Tools\URL;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Thelia\Log\Tlog;
use Thelia\Core\HttpFoundation\Response;

/**
 * Class ConfigurationController
 * @package Carousel\Controller
 * @author manuel raynaud <mraynaud@openstudio.fr>
 */
class HookScraperController extends BaseAdminController
{
	public function scrapeProduct(Request $request){
		$log = Tlog::getInstance ();
		$log->debug ( "-- hookscraper " );
		
		//return new JsonResponse (array('stuff' => 'more stuff'));
		
		if ($request->isXmlHttpRequest ()) {
			$response = new Response();
			$responsePage =$this->getPage($request);
			
			$log->debug ( "-- hookscraper_page ".$responsePage );
			$response->setContent($responsePage);
			
			return $response;
		}
		else
		{
			return new JsonResponse ( array ('stuff' => 'more stuff') ); // $productsQuerry->__toString()
		}
	}
	
private function getPage(Request $request){
		//miltner rudolf
		//AEEHT100
	$product_gc_id =$request->request->get("product_gc_id");
	echo " Results for ".$product_gc_id."<br>";
	
	
	$full_results = "";
set_time_limit (0);
//first request in order to get some cookies :P
$cookiefile = dirname(__FILE__) . '/cookie.txt';

$ch1 = curl_init("http://www.gconlineplus.at");

curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch1, CURLOPT_COOKIEJAR, $cookiefile);
curl_setopt($ch1, CURLOPT_COOKIEFILE, $cookiefile);
curl_setopt($ch1, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2767.4 Safari/537.36");

$result1 = curl_exec($ch1);
$full_results .=$result1;


echo "first request sent, received cookies <br>";	
ob_flush();flush();


file_put_contents(dirname(__FILE__) ."\\responses\\1scraper_first.txt", $result1."\n\n");
file_put_contents(dirname(__FILE__) ."\\errors\\1scraper_error_first.txt", curl_error($ch1)."\n\n");

curl_close($ch1);

$formFields = array();

$formFields['__EVENTTARGET'] = $this->get_input($result1,'id="__EVENTTARGET" value="');
$formFields['__EVENTARGUMENT'] = $this->get_input($result1,'id="__EVENTARGUMENT" value="');
$formFields['__EVENTSTATE'] = $this->get_input($result1,'id="__VIEWSTATE" value="');

$formFields['__VIEWSTATEGENERATOR'] = $this->get_input($result1,'id="__VIEWSTATEGENERATOR" value="');
$formFields['__EVENTVALIDATION'] = $this->get_input($result1,'id="__EVENTVALIDATION" value="');

$formFields['txtUserName'] = 'NWING14C5';
$formFields['txtPassword'] = 'budget07';


//second in order to update some event data
$ch1 = curl_init("http://www.gconlineplus.at/loginpanel.aspx");

curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch1, CURLOPT_COOKIEJAR, $cookiefile);
curl_setopt($ch1, CURLOPT_COOKIEFILE, $cookiefile);
curl_setopt($ch1, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2767.4 Safari/537.36");

$result1 = curl_exec($ch1);
$full_results .=$result1;
echo "second request sent, received asp hidden fields <br>";
ob_flush();flush();

//echo $result1;
file_put_contents(dirname(__FILE__) ."\\responses\\2scraper_second.txt", $result1."\n\n");
file_put_contents(dirname(__FILE__) ."\\errors\\2scraper_error_second.txt", curl_error($ch1)."\n\n");

curl_close($ch1);

$formFields = array();

$formFields['__EVENTTARGET'] = $this->get_input($result1,'id="__EVENTTARGET" value="');
$formFields['__EVENTARGUMENT'] = $this->get_input($result1,'id="__EVENTARGUMENT" value="');
$formFields['__VIEWSTATE'] = $this->get_input($result1,'id="__VIEWSTATE" value="');

$formFields['__VIEWSTATEGENERATOR'] = $this->get_input($result1,'id="__VIEWSTATEGENERATOR" value="');
$formFields['__EVENTVALIDATION'] = $this->get_input($result1,'id="__EVENTVALIDATION" value="');

$formFields['txtUserName'] = 'NWING14C5';
$formFields['txtPassword'] = 'budget07';


// send login request
//$ch1 = curl_init("localhost/scraper/form.php");
$ch1 = curl_init("http://www.gconlineplus.at/loginpanel.aspx");

$fieldsString = "";
//url-ify the data for the POST
foreach($formFields as $key=>$value) { $fieldsString .= $key.'='.$value.'&'; }
$fieldsString = rtrim($fieldsString, '&');

//echo "<br> ".$fieldsString." <br>";
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch1, CURLOPT_COOKIEJAR, $cookiefile);
curl_setopt($ch1, CURLOPT_COOKIEFILE, $cookiefile);
curl_setopt($ch1, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2767.4 Safari/537.36");
curl_setopt($ch1, CURLOPT_POST, 1);
curl_setopt($ch1,CURLOPT_POSTFIELDS, $fieldsString);
curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, 1);
/*
curl_setopt($ch1, CURLOPT_HTTPHEADER, array(
 "Accept" => "application/json, text/javascript, *//*; q=0.01",
 "Accept-Encoding" => "deflate",
 "Content-Length" => strlen($fieldsString),
 "Content-Type" => "application/x-www-form-urlencoded", 
 "Host" => "www.gconlineplus.at",
 "Origin" => "http://www.gconlineplus.at",
 "Referer" => "http://www.gconlineplus.at/loginpanel.aspx"
 ));*/

$result1 = curl_exec($ch1); 
$full_results .=$result1;
echo "third request sent, user is logged in <br>";
ob_flush();flush();

//echo $result1;

file_put_contents(dirname(__FILE__) ."\\responses\\3scraper_login.txt", $result1."\n\n");
file_put_contents(dirname(__FILE__) ."\\errors\\3scraper_error_login.txt", curl_error($ch1)."\n\n");

curl_close($ch1);

// set search parameters
//$ch1 = curl_init("localhost/scraper/form.php");
$ch1 = curl_init("http://www.gconlineplus.at/FullTextSearch.aspx/SetSearchParmsFT");

$searchParams = array();
$searchParams['strSearchText'] = $product_gc_id;
$searchParams['strExcludeText'] = ' ';
$searchParams['blnSearchWithOr'] = false;
$searchParams['strDiscounts'] = '';
$searchParams['strDiscountText'] = '';
$searchParams['strFilterStock'] = '555104';
$searchParams['blnOnlyStock'] = false;
$searchParams['blnOnlyProductNumber'] = false;
$searchParams['blnOnlyManufacturerNo'] = false;

$searchParams_data = json_encode($searchParams); 

curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch1, CURLOPT_COOKIEJAR, $cookiefile);
curl_setopt($ch1, CURLOPT_COOKIEFILE, $cookiefile);
curl_setopt($ch1, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2767.4 Safari/537.36");
curl_setopt($ch1, CURLOPT_POST, 1);
//curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch1,CURLOPT_POSTFIELDS, $searchParams_data);
curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch1, CURLOPT_HTTPHEADER, array(
 "Accept: application/json,text/javascript,*/*;q=0.01",
 "Accept-Encoding: deflate",
 "Content-Type: application/json;charset=UTF-8", 
 "Content-Length: ".strlen($searchParams_data),
 "X-Requested-With: XMLHttpRequest"
 ));

$result1 = curl_exec($ch1); 
$full_results .=$result1;
echo "forth request sent, search parameters have been sent <br>";
ob_flush();flush();

//echo $result1;

file_put_contents(dirname(__FILE__) ."\\posts\\4scraper_post_search_parameters.txt", $searchParams_data."\n".strlen($searchParams_data)."\n\n");
file_put_contents(dirname(__FILE__) ."\\responses\\4scraper_search_parameters.txt", $result1."\n\n");
file_put_contents(dirname(__FILE__) ."\\errors\\4scraper_error_search_parameters.txt", curl_error($ch1)."\n\n");

curl_close($ch1);

// get search results
//$ch1 = curl_init("localhost/scraper/form.php");
$ch1 = curl_init("http://www.gconlineplus.at/ProductResultList.aspx/GetProducts");

$searchParams = array();
$searchParams['strOrder'] = 'Bestand';
$searchParams['strDirection'] = 'asc';
$searchParams['_search'] = false;
$searchParams['nd'] = 1466248084681;
$searchParams['rows'] = -1;
$searchParams['page'] = 1;
$searchParams['sidx'] = '';
$searchParams['sord'] = 'asc';

$searchParams_data = json_encode($searchParams); 

curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch1, CURLOPT_COOKIEJAR, $cookiefile);
curl_setopt($ch1, CURLOPT_COOKIEFILE, $cookiefile);
curl_setopt($ch1, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2767.4 Safari/537.36");
curl_setopt($ch1, CURLOPT_POST, 1);
//curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch1,CURLOPT_POSTFIELDS, $searchParams_data);
curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch1, CURLOPT_HTTPHEADER, array(
 "Accept: application/json,text/javascript,*/*;q=0.01",
 "Accept-Encoding: deflate",
 "Content-Type: application/json;charset=UTF-8", 
 "Content-Length: ".strlen($searchParams_data),
 "X-Requested-With: XMLHttpRequest"
 ));

$result1 = curl_exec($ch1);
$full_results .=$result1;
echo "fifth request sent, got search response <br>";
ob_flush();flush();

//echo $result1;
file_put_contents(dirname(__FILE__) ."\\posts\\5scraper_post_search_products.txt", $searchParams_data."\n".strlen($searchParams_data)."\n\n");
file_put_contents(dirname(__FILE__) ."\\responses\\5scraper_search_products.txt", $result1."\n\n");
file_put_contents(dirname(__FILE__) ."\\errors\\5scraper_error_search_products.txt", curl_error($ch1)."\n\n");

	curl_close($ch1);

	//TODO make it a streaming response
	
	return $result1;
		
	}
	
	private function get_input($result, $target_string){
		$target_start = strpos($result, $target_string)+strlen($target_string);
	
		if ($target_start !== FALSE){
			$target_end = strpos($result,'" />',$target_start);
			$target_value = substr($result,$target_start,$target_end-$target_start);
			//echo $target_start." ".$target_end." |".$target_value."|<br>";
			return urlencode($target_value);
		}
	
	}
	
	
    public function uploadImage()
    {
        if (null !== $response = $this->checkAuth(AdminResources::MODULE, ['carousel'], AccessManager::CREATE)) {
            return $response;
        }

        $request = $this->getRequest();
        $form = $this->createForm('carousel.image');
        $error_message = null;
        try {
            $this->validateForm($form);

            /** @var \Symfony\Component\HttpFoundation\File\UploadedFile $fileBeingUploaded */
            $fileBeingUploaded = $request->files->get(sprintf('%s[file]', $form->getName()), null, true);

            $fileModel = new Carousel();

            $fileCreateOrUpdateEvent = new FileCreateOrUpdateEvent(1);
            $fileCreateOrUpdateEvent->setModel($fileModel);
            $fileCreateOrUpdateEvent->setUploadedFile($fileBeingUploaded);

            $this->dispatch(
                TheliaEvents::IMAGE_SAVE,
                $fileCreateOrUpdateEvent
            );

            // Compensate issue #1005
            $langs = LangQuery::create()->find();

            /** @var Lang $lang */
            foreach ($langs as $lang) {
                $fileCreateOrUpdateEvent->getModel()->setLocale($lang->getLocale())->setTitle('')->save();
            }

            $response =  $this->redirectToConfigurationPage();

        } catch (FormValidationException $e) {
            $error_message = $this->createStandardFormValidationErrorMessage($e);
        }

        if (null !== $error_message) {
            $this->setupFormErrorContext(
                'carousel upload',
                $error_message,
                $form
            );

            $response = $this->render(
                "module-configure",
                [
                    'module_code' => 'Carousel'
                ]
            );
        }

        return $response;
    }

    /**
     * @param Form $form
     * @param string $fieldName
     * @param int $id
     * @return string
     */
    protected function getFormFieldValue($form, $fieldName, $id)
    {
        $value = $form->get(sprintf('%s%d', $fieldName, $id))->getData();

        return $value;
    }

    public function updateAction()
    {
        if (null !== $response = $this->checkAuth(AdminResources::MODULE, ['carousel'], AccessManager::UPDATE)) {
            return $response;
        }

        $form = $this->createForm('carousel.update');

        $error_message = null;

        try {
            $updateForm = $this->validateForm($form);

            $carousels = CarouselQuery::create()->findAllByPosition();

            $locale = $this->getCurrentEditionLocale();

            /** @var Carousel $carousel */
            foreach ($carousels as $carousel) {
                $id = $carousel->getId();

                $carousel
                    ->setPosition($this->getFormFieldValue($updateForm, 'position', $id))
                    ->setUrl($this->getFormFieldValue($updateForm, 'url', $id))
                    ->setLocale($locale)
                    ->setTitle($this->getFormFieldValue($updateForm, 'title', $id))
                    ->setAlt($this->getFormFieldValue($updateForm, 'alt', $id))
                    ->setChapo($this->getFormFieldValue($updateForm, 'chapo', $id))
                    ->setDescription($this->getFormFieldValue($updateForm, 'description', $id))
                    ->setPostscriptum($this->getFormFieldValue($updateForm, 'postscriptum', $id))
                ->save();
            }

            $response =  $this->redirectToConfigurationPage();

        } catch (FormValidationException $e) {
            $error_message = $this->createStandardFormValidationErrorMessage($e);
        }

        if (null !== $error_message) {
            $this->setupFormErrorContext(
                'carousel upload',
                $error_message,
                $form
            );

            $response = $this->render("module-configure", [ 'module_code' => 'Carousel' ]);
        }

        return $response;

    }

    protected function redirectToConfigurationPage()
    {
        return RedirectResponse::create(URL::getInstance()->absoluteUrl('/admin/module/Carousel'));
    }
}