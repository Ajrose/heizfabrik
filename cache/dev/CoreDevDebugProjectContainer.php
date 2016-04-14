<?php

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\InactiveScopeException;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;

/**
 * CoreDevDebugProjectContainer.
 *
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 */
class CoreDevDebugProjectContainer extends Container
{
    private $parameters;
    private $targetDirs = array();

    /**
     * Constructor.
     */
    public function __construct()
    {
        $dir = __DIR__;
        for ($i = 1; $i <= 5; ++$i) {
            $this->targetDirs[$i] = $dir = dirname($dir);
        }
        $this->parameters = $this->getDefaultParameters();

        $this->services =
        $this->scopedServices =
        $this->scopeStacks = array();
        $this->scopes = array('request' => 'container');
        $this->scopeChildren = array('request' => array());
        $this->methodMap = array(
            'assetic.asset.manager' => 'getAssetic_Asset_ManagerService',
            'base_http_kernel' => 'getBaseHttpKernelService',
            'carousel.hook' => 'getCarousel_HookService',
            'compass.assetic.filter' => 'getCompass_Assetic_FilterService',
            'controller.default' => 'getController_DefaultService',
            'controller.listener' => 'getController_ListenerService',
            'controller_resolver' => 'getControllerResolverService',
            'cssembed.assetic.filter' => 'getCssembed_Assetic_FilterService',
            'cssimport.assetic.filter' => 'getCssimport_Assetic_FilterService',
            'cssrewrite.assetic.filter' => 'getCssrewrite_Assetic_FilterService',
            'currency.converter' => 'getCurrency_ConverterService',
            'currency.converter.ecbprovider' => 'getCurrency_Converter_EcbproviderService',
            'error.listener' => 'getError_ListenerService',
            'esi' => 'getEsiService',
            'esi_listener' => 'getEsiListenerService',
            'event_dispatcher' => 'getEventDispatcherService',
            'fragment.renderer.esi' => 'getFragment_Renderer_EsiService',
            'fragment.renderer.inline' => 'getFragment_Renderer_InlineService',
            'hookanalytics.hook.front' => 'getHookanalytics_Hook_FrontService',
            'hookcart.hook.front' => 'getHookcart_Hook_FrontService',
            'hookcontact.hook.front' => 'getHookcontact_Hook_FrontService',
            'hookcurrency.hook.front' => 'getHookcurrency_Hook_FrontService',
            'hookcustomer.hook.front' => 'getHookcustomer_Hook_FrontService',
            'hookkonfigurator.hook.front' => 'getHookkonfigurator_Hook_FrontService',
            'hooklang.hook.front' => 'getHooklang_Hook_FrontService',
            'hooklinks.hook.front' => 'getHooklinks_Hook_FrontService',
            'hooknavigation.hook.front' => 'getHooknavigation_Hook_FrontService',
            'hooknewsletter.hook.front' => 'getHooknewsletter_Hook_FrontService',
            'hookproductsnew.hook.front' => 'getHookproductsnew_Hook_FrontService',
            'hookproductsoffer.hook.front' => 'getHookproductsoffer_Hook_FrontService',
            'hooksearch.hook.front' => 'getHooksearch_Hook_FrontService',
            'hooksocial.hook.front' => 'getHooksocial_Hook_FrontService',
            'http_kernel' => 'getHttpKernelService',
            'initparam.middleware' => 'getInitparam_MiddlewareService',
            'kernel' => 'getKernelService',
            'less.assetic.filter' => 'getLess_Assetic_FilterService',
            'less_legacy.assetic.filter' => 'getLessLegacy_Assetic_FilterService',
            'listener.router' => 'getListener_RouterService',
            'mailer' => 'getMailerService',
            'module.carousel' => 'getModule_CarouselService',
            'module.front' => 'getModule_FrontService',
            'module.hookanalytics' => 'getModule_HookanalyticsService',
            'module.hookcart' => 'getModule_HookcartService',
            'module.hookcontact' => 'getModule_HookcontactService',
            'module.hookcurrency' => 'getModule_HookcurrencyService',
            'module.hookcustomer' => 'getModule_HookcustomerService',
            'module.hookkonfigurator' => 'getModule_HookkonfiguratorService',
            'module.hooklang' => 'getModule_HooklangService',
            'module.hooklinks' => 'getModule_HooklinksService',
            'module.hooknavigation' => 'getModule_HooknavigationService',
            'module.hooknewsletter' => 'getModule_HooknewsletterService',
            'module.hookproductsnew' => 'getModule_HookproductsnewService',
            'module.hookproductsoffer' => 'getModule_HookproductsofferService',
            'module.hooksearch' => 'getModule_HooksearchService',
            'module.hooksocial' => 'getModule_HooksocialService',
            'module.theliasmarty' => 'getModule_TheliasmartyService',
            'module.virtualproductcontrol' => 'getModule_VirtualproductcontrolService',
            'request' => 'getRequestService',
            'request.context' => 'getRequest_ContextService',
            'response.listener' => 'getResponse_ListenerService',
            'router.admin' => 'getRouter_AdminService',
            'router.api' => 'getRouter_ApiService',
            'router.carousel' => 'getRouter_CarouselService',
            'router.chainrequest' => 'getRouter_ChainrequestService',
            'router.filelocator' => 'getRouter_FilelocatorService',
            'router.front' => 'getRouter_FrontService',
            'router.hookanalytics' => 'getRouter_HookanalyticsService',
            'router.hooknavigation' => 'getRouter_HooknavigationService',
            'router.hooksocial' => 'getRouter_HooksocialService',
            'router.module.filelocator' => 'getRouter_Module_FilelocatorService',
            'router.module.xmlloader' => 'getRouter_Module_XmlloaderService',
            'router.rewrite' => 'getRouter_RewriteService',
            'router.xmlloader' => 'getRouter_XmlloaderService',
            'sass.assetic.filter' => 'getSass_Assetic_FilterService',
            'service_container' => 'getServiceContainerService',
            'session.listener' => 'getSession_ListenerService',
            'session.middleware' => 'getSession_MiddlewareService',
            'smart.plugin.form' => 'getSmart_Plugin_FormService',
            'smarty.plugin.adminutilities' => 'getSmarty_Plugin_AdminutilitiesService',
            'smarty.plugin.assets' => 'getSmarty_Plugin_AssetsService',
            'smarty.plugin.cartpostage' => 'getSmarty_Plugin_CartpostageService',
            'smarty.plugin.dataaccess' => 'getSmarty_Plugin_DataaccessService',
            'smarty.plugin.esi' => 'getSmarty_Plugin_EsiService',
            'smarty.plugin.flashmessage' => 'getSmarty_Plugin_FlashmessageService',
            'smarty.plugin.format' => 'getSmarty_Plugin_FormatService',
            'smarty.plugin.hook' => 'getSmarty_Plugin_HookService',
            'smarty.plugin.module' => 'getSmarty_Plugin_ModuleService',
            'smarty.plugin.render' => 'getSmarty_Plugin_RenderService',
            'smarty.plugin.security' => 'getSmarty_Plugin_SecurityService',
            'smarty.plugin.thelialoop' => 'getSmarty_Plugin_ThelialoopService',
            'smarty.plugin.translation' => 'getSmarty_Plugin_TranslationService',
            'smarty.plugin.type' => 'getSmarty_Plugin_TypeService',
            'smarty.url.module' => 'getSmarty_Url_ModuleService',
            'stack_factory' => 'getStackFactoryService',
            'test.client' => 'getTest_ClientService',
            'test.client.cookiejar' => 'getTest_Client_CookiejarService',
            'test.client.history' => 'getTest_Client_HistoryService',
            'thelia.action.address' => 'getThelia_Action_AddressService',
            'thelia.action.administrator' => 'getThelia_Action_AdministratorService',
            'thelia.action.api' => 'getThelia_Action_ApiService',
            'thelia.action.area' => 'getThelia_Action_AreaService',
            'thelia.action.attribute' => 'getThelia_Action_AttributeService',
            'thelia.action.attributeav' => 'getThelia_Action_AttributeavService',
            'thelia.action.brand' => 'getThelia_Action_BrandService',
            'thelia.action.cache' => 'getThelia_Action_CacheService',
            'thelia.action.cart' => 'getThelia_Action_CartService',
            'thelia.action.category' => 'getThelia_Action_CategoryService',
            'thelia.action.config' => 'getThelia_Action_ConfigService',
            'thelia.action.content' => 'getThelia_Action_ContentService',
            'thelia.action.country' => 'getThelia_Action_CountryService',
            'thelia.action.coupon' => 'getThelia_Action_CouponService',
            'thelia.action.currency' => 'getThelia_Action_CurrencyService',
            'thelia.action.customer' => 'getThelia_Action_CustomerService',
            'thelia.action.customer_title' => 'getThelia_Action_CustomerTitleService',
            'thelia.action.document' => 'getThelia_Action_DocumentService',
            'thelia.action.feature' => 'getThelia_Action_FeatureService',
            'thelia.action.featureav' => 'getThelia_Action_FeatureavService',
            'thelia.action.file' => 'getThelia_Action_FileService',
            'thelia.action.folder' => 'getThelia_Action_FolderService',
            'thelia.action.hook' => 'getThelia_Action_HookService',
            'thelia.action.httpexception' => 'getThelia_Action_HttpexceptionService',
            'thelia.action.image' => 'getThelia_Action_ImageService',
            'thelia.action.lang' => 'getThelia_Action_LangService',
            'thelia.action.mailing_system' => 'getThelia_Action_MailingSystemService',
            'thelia.action.message' => 'getThelia_Action_MessageService',
            'thelia.action.module' => 'getThelia_Action_ModuleService',
            'thelia.action.modulehook' => 'getThelia_Action_ModulehookService',
            'thelia.action.newsletter' => 'getThelia_Action_NewsletterService',
            'thelia.action.order' => 'getThelia_Action_OrderService',
            'thelia.action.pdf' => 'getThelia_Action_PdfService',
            'thelia.action.product' => 'getThelia_Action_ProductService',
            'thelia.action.product_sale_element' => 'getThelia_Action_ProductSaleElementService',
            'thelia.action.profile' => 'getThelia_Action_ProfileService',
            'thelia.action.redirectexception' => 'getThelia_Action_RedirectexceptionService',
            'thelia.action.sale' => 'getThelia_Action_SaleService',
            'thelia.action.shippingzone' => 'getThelia_Action_ShippingzoneService',
            'thelia.action.tax' => 'getThelia_Action_TaxService',
            'thelia.action.taxrule' => 'getThelia_Action_TaxruleService',
            'thelia.action.template' => 'getThelia_Action_TemplateService',
            'thelia.action.translation' => 'getThelia_Action_TranslationService',
            'thelia.admin.base_controller' => 'getThelia_Admin_BaseControllerService',
            'thelia.archive_builder.tar' => 'getThelia_ArchiveBuilder_TarService',
            'thelia.archive_builder.tar_bz2' => 'getThelia_ArchiveBuilder_TarBz2Service',
            'thelia.archive_builder.tar_gz' => 'getThelia_ArchiveBuilder_TarGzService',
            'thelia.archive_builder.zip' => 'getThelia_ArchiveBuilder_ZipService',
            'thelia.condition.cart_contains_categories' => 'getThelia_Condition_CartContainsCategoriesService',
            'thelia.condition.cart_contains_products' => 'getThelia_Condition_CartContainsProductsService',
            'thelia.condition.factory' => 'getThelia_Condition_FactoryService',
            'thelia.condition.for_some_customers' => 'getThelia_Condition_ForSomeCustomersService',
            'thelia.condition.match_billing_countries' => 'getThelia_Condition_MatchBillingCountriesService',
            'thelia.condition.match_delivery_countries' => 'getThelia_Condition_MatchDeliveryCountriesService',
            'thelia.condition.match_for_everyone' => 'getThelia_Condition_MatchForEveryoneService',
            'thelia.condition.match_for_total_amount' => 'getThelia_Condition_MatchForTotalAmountService',
            'thelia.condition.match_for_x_articles' => 'getThelia_Condition_MatchForXArticlesService',
            'thelia.condition.start_date' => 'getThelia_Condition_StartDateService',
            'thelia.condition.validator' => 'getThelia_Condition_ValidatorService',
            'thelia.coupon.factory' => 'getThelia_Coupon_FactoryService',
            'thelia.coupon.manager' => 'getThelia_Coupon_ManagerService',
            'thelia.coupon.type.free_product' => 'getThelia_Coupon_Type_FreeProductService',
            'thelia.coupon.type.remove_amount_on_attribute_av' => 'getThelia_Coupon_Type_RemoveAmountOnAttributeAvService',
            'thelia.coupon.type.remove_amount_on_categories' => 'getThelia_Coupon_Type_RemoveAmountOnCategoriesService',
            'thelia.coupon.type.remove_amount_on_products' => 'getThelia_Coupon_Type_RemoveAmountOnProductsService',
            'thelia.coupon.type.remove_percentage_on_attribute_av' => 'getThelia_Coupon_Type_RemovePercentageOnAttributeAvService',
            'thelia.coupon.type.remove_percentage_on_categories' => 'getThelia_Coupon_Type_RemovePercentageOnCategoriesService',
            'thelia.coupon.type.remove_percentage_on_products' => 'getThelia_Coupon_Type_RemovePercentageOnProductsService',
            'thelia.coupon.type.remove_x_amount' => 'getThelia_Coupon_Type_RemoveXAmountService',
            'thelia.coupon.type.remove_x_percent' => 'getThelia_Coupon_Type_RemoveXPercentService',
            'thelia.export.change_position' => 'getThelia_Export_ChangePositionService',
            'thelia.facade' => 'getThelia_FacadeService',
            'thelia.file_manager' => 'getThelia_FileManagerService',
            'thelia.form.type.customer_title' => 'getThelia_Form_Type_CustomerTitleService',
            'thelia.form.type.customer_title_i18n' => 'getThelia_Form_Type_CustomerTitleI18nService',
            'thelia.form.type.field.accessory_id' => 'getThelia_Form_Type_Field_AccessoryIdService',
            'thelia.form.type.field.address_id' => 'getThelia_Form_Type_Field_AddressIdService',
            'thelia.form.type.field.admin_id' => 'getThelia_Form_Type_Field_AdminIdService',
            'thelia.form.type.field.admin_log_id' => 'getThelia_Form_Type_Field_AdminLogIdService',
            'thelia.form.type.field.api_id' => 'getThelia_Form_Type_Field_ApiIdService',
            'thelia.form.type.field.area_delivery_module_id' => 'getThelia_Form_Type_Field_AreaDeliveryModuleIdService',
            'thelia.form.type.field.area_id' => 'getThelia_Form_Type_Field_AreaIdService',
            'thelia.form.type.field.attribute_av' => 'getThelia_Form_Type_Field_AttributeAvService',
            'thelia.form.type.field.attribute_id' => 'getThelia_Form_Type_Field_AttributeIdService',
            'thelia.form.type.field.attribute_template_id' => 'getThelia_Form_Type_Field_AttributeTemplateIdService',
            'thelia.form.type.field.brand_id' => 'getThelia_Form_Type_Field_BrandIdService',
            'thelia.form.type.field.cart_id' => 'getThelia_Form_Type_Field_CartIdService',
            'thelia.form.type.field.cart_item_id' => 'getThelia_Form_Type_Field_CartItemIdService',
            'thelia.form.type.field.category_associated_content_id' => 'getThelia_Form_Type_Field_CategoryAssociatedContentIdService',
            'thelia.form.type.field.category_id' => 'getThelia_Form_Type_Field_CategoryIdService',
            'thelia.form.type.field.content_id' => 'getThelia_Form_Type_Field_ContentIdService',
            'thelia.form.type.field.country_id' => 'getThelia_Form_Type_Field_CountryIdService',
            'thelia.form.type.field.coupon_id' => 'getThelia_Form_Type_Field_CouponIdService',
            'thelia.form.type.field.currency_id' => 'getThelia_Form_Type_Field_CurrencyIdService',
            'thelia.form.type.field.customer_id' => 'getThelia_Form_Type_Field_CustomerIdService',
            'thelia.form.type.field.customer_title_id' => 'getThelia_Form_Type_Field_CustomerTitleIdService',
            'thelia.form.type.field.export_category_id' => 'getThelia_Form_Type_Field_ExportCategoryIdService',
            'thelia.form.type.field.export_id' => 'getThelia_Form_Type_Field_ExportIdService',
            'thelia.form.type.field.feature_av_id' => 'getThelia_Form_Type_Field_FeatureAvIdService',
            'thelia.form.type.field.feature_id' => 'getThelia_Form_Type_Field_FeatureIdService',
            'thelia.form.type.field.feature_product_id' => 'getThelia_Form_Type_Field_FeatureProductIdService',
            'thelia.form.type.field.feature_template_id' => 'getThelia_Form_Type_Field_FeatureTemplateIdService',
            'thelia.form.type.field.folder_id' => 'getThelia_Form_Type_Field_FolderIdService',
            'thelia.form.type.field.form_firewall_id' => 'getThelia_Form_Type_Field_FormFirewallIdService',
            'thelia.form.type.field.hook_id' => 'getThelia_Form_Type_Field_HookIdService',
            'thelia.form.type.field.import_category_id' => 'getThelia_Form_Type_Field_ImportCategoryIdService',
            'thelia.form.type.field.import_id' => 'getThelia_Form_Type_Field_ImportIdService',
            'thelia.form.type.field.lang_id' => 'getThelia_Form_Type_Field_LangIdService',
            'thelia.form.type.field.message_id' => 'getThelia_Form_Type_Field_MessageIdService',
            'thelia.form.type.field.meta_data_id' => 'getThelia_Form_Type_Field_MetaDataIdService',
            'thelia.form.type.field.module_config_id' => 'getThelia_Form_Type_Field_ModuleConfigIdService',
            'thelia.form.type.field.module_hook_id' => 'getThelia_Form_Type_Field_ModuleHookIdService',
            'thelia.form.type.field.module_id' => 'getThelia_Form_Type_Field_ModuleIdService',
            'thelia.form.type.field.newsletter_id' => 'getThelia_Form_Type_Field_NewsletterIdService',
            'thelia.form.type.field.order_address_id' => 'getThelia_Form_Type_Field_OrderAddressIdService',
            'thelia.form.type.field.order_coupon_id' => 'getThelia_Form_Type_Field_OrderCouponIdService',
            'thelia.form.type.field.order_id' => 'getThelia_Form_Type_Field_OrderIdService',
            'thelia.form.type.field.order_product_attribute_combination_id' => 'getThelia_Form_Type_Field_OrderProductAttributeCombinationIdService',
            'thelia.form.type.field.order_product_id' => 'getThelia_Form_Type_Field_OrderProductIdService',
            'thelia.form.type.field.order_product_tax_id' => 'getThelia_Form_Type_Field_OrderProductTaxIdService',
            'thelia.form.type.field.order_status_id' => 'getThelia_Form_Type_Field_OrderStatusIdService',
            'thelia.form.type.field.product_associated_content_id' => 'getThelia_Form_Type_Field_ProductAssociatedContentIdService',
            'thelia.form.type.field.product_id' => 'getThelia_Form_Type_Field_ProductIdService',
            'thelia.form.type.field.product_sale_elements_id' => 'getThelia_Form_Type_Field_ProductSaleElementsIdService',
            'thelia.form.type.field.profile_id' => 'getThelia_Form_Type_Field_ProfileIdService',
            'thelia.form.type.field.resource_id' => 'getThelia_Form_Type_Field_ResourceIdService',
            'thelia.form.type.field.rewriting_url_id' => 'getThelia_Form_Type_Field_RewritingUrlIdService',
            'thelia.form.type.field.sale_id' => 'getThelia_Form_Type_Field_SaleIdService',
            'thelia.form.type.field.sale_product_id' => 'getThelia_Form_Type_Field_SaleProductIdService',
            'thelia.form.type.field.tax_id' => 'getThelia_Form_Type_Field_TaxIdService',
            'thelia.form.type.field.tax_rule_id' => 'getThelia_Form_Type_Field_TaxRuleIdService',
            'thelia.form.type.field.template_id' => 'getThelia_Form_Type_Field_TemplateIdService',
            'thelia.form.type.image' => 'getThelia_Form_Type_ImageService',
            'thelia.form.type.product_sale_elements' => 'getThelia_Form_Type_ProductSaleElementsService',
            'thelia.form.type.standard_fields' => 'getThelia_Form_Type_StandardFieldsService',
            'thelia.form.type.tax_rule' => 'getThelia_Form_Type_TaxRuleService',
            'thelia.form.type.tax_rule_i18n' => 'getThelia_Form_Type_TaxRuleI18nService',
            'thelia.form_factory' => 'getThelia_FormFactoryService',
            'thelia.form_factory_builder' => 'getThelia_FormFactoryBuilderService',
            'thelia.form_validator' => 'getThelia_FormValidatorService',
            'thelia.formatter.csv_formatter' => 'getThelia_Formatter_CsvFormatterService',
            'thelia.formatter.json_formatter' => 'getThelia_Formatter_JsonFormatterService',
            'thelia.formatter.xml_formatter' => 'getThelia_Formatter_XmlFormatterService',
            'thelia.forms.extension.core_extension' => 'getThelia_Forms_Extension_CoreExtensionService',
            'thelia.forms.extension.http_foundation_extension' => 'getThelia_Forms_Extension_HttpFoundationExtensionService',
            'thelia.forms.validator_builder' => 'getThelia_Forms_ValidatorBuilderService',
            'thelia.hookhelper' => 'getThelia_HookhelperService',
            'thelia.import.change_position' => 'getThelia_Import_ChangePositionService',
            'thelia.listener.view' => 'getThelia_Listener_ViewService',
            'thelia.logger' => 'getThelia_LoggerService',
            'thelia.manager.archive_builder_manager' => 'getThelia_Manager_ArchiveBuilderManagerService',
            'thelia.manager.formatter_manager' => 'getThelia_Manager_FormatterManagerService',
            'thelia.metadata' => 'getThelia_MetadataService',
            'thelia.parser' => 'getThelia_ParserService',
            'thelia.parser.asset.resolver' => 'getThelia_Parser_Asset_ResolverService',
            'thelia.parser.context' => 'getThelia_Parser_ContextService',
            'thelia.parser.helper' => 'getThelia_Parser_HelperService',
            'thelia.securitycontext' => 'getThelia_SecuritycontextService',
            'thelia.taxengine' => 'getThelia_TaxengineService',
            'thelia.template_helper' => 'getThelia_TemplateHelperService',
            'thelia.token_provider' => 'getThelia_TokenProviderService',
            'thelia.translator' => 'getThelia_TranslatorService',
            'thelia.url.manager' => 'getThelia_Url_ManagerService',
            'translation.loader.csv' => 'getTranslation_Loader_CsvService',
            'translation.loader.dat' => 'getTranslation_Loader_DatService',
            'translation.loader.ini' => 'getTranslation_Loader_IniService',
            'translation.loader.mo' => 'getTranslation_Loader_MoService',
            'translation.loader.php' => 'getTranslation_Loader_PhpService',
            'translation.loader.po' => 'getTranslation_Loader_PoService',
            'translation.loader.qt' => 'getTranslation_Loader_QtService',
            'translation.loader.res' => 'getTranslation_Loader_ResService',
            'translation.loader.xliff' => 'getTranslation_Loader_XliffService',
            'translation.loader.yml' => 'getTranslation_Loader_YmlService',
            'validators.translator' => 'getValidators_TranslatorService',
            'virtualproductcontrol.hook' => 'getVirtualproductcontrol_HookService',
        );

        $this->aliases = array();
    }

    /**
     * Gets the 'assetic.asset.manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Template\Assets\AsseticAssetManager A Thelia\Core\Template\Assets\AsseticAssetManager instance.
     */
    protected function getAssetic_Asset_ManagerService()
    {
        $this->services['assetic.asset.manager'] = $instance = new \Thelia\Core\Template\Assets\AsseticAssetManager(true);

        $instance->registerAssetFilter('less', $this->get('less.assetic.filter'));
        $instance->registerAssetFilter('less_legacy', $this->get('less_legacy.assetic.filter'));
        $instance->registerAssetFilter('sass', $this->get('sass.assetic.filter'));
        $instance->registerAssetFilter('cssembed', $this->get('cssembed.assetic.filter'));
        $instance->registerAssetFilter('cssrewrite', $this->get('cssrewrite.assetic.filter'));
        $instance->registerAssetFilter('cssimport', $this->get('cssimport.assetic.filter'));
        $instance->registerAssetFilter('compass', $this->get('compass.assetic.filter'));

        return $instance;
    }

    /**
     * Gets the 'base_http_kernel' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\TheliaHttpKernel A Thelia\Core\TheliaHttpKernel instance.
     */
    protected function getBaseHttpKernelService()
    {
        return $this->services['base_http_kernel'] = new \Thelia\Core\TheliaHttpKernel($this->get('event_dispatcher'), $this, $this->get('controller_resolver'));
    }

    /**
     * Gets the 'carousel.hook' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Carousel\Hook\CarouselHook A Carousel\Hook\CarouselHook instance.
     * 
     * @throws InactiveScopeException when the 'carousel.hook' service is requested while the 'request' scope is not active
     */
    protected function getCarousel_HookService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('carousel.hook', 'request');
        }

        $this->services['carousel.hook'] = $this->scopedServices['request']['carousel.hook'] = $instance = new \Carousel\Hook\CarouselHook();

        $instance->module = $this->get('module.carousel');
        $instance->parser = $this->get('thelia.parser');
        $instance->translator = $this->get('thelia.translator');
        $instance->assetsResolver = $this->get('thelia.parser.asset.resolver');
        $instance->dispatcher = $this->get('event_dispatcher');

        return $instance;
    }

    /**
     * Gets the 'compass.assetic.filter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Assetic\Filter\CompassFilter A Assetic\Filter\CompassFilter instance.
     */
    protected function getCompass_Assetic_FilterService()
    {
        return $this->services['compass.assetic.filter'] = new \Assetic\Filter\CompassFilter();
    }

    /**
     * Gets the 'controller.default' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Controller\DefaultController A Thelia\Controller\DefaultController instance.
     */
    protected function getController_DefaultService()
    {
        return $this->services['controller.default'] = new \Thelia\Controller\DefaultController();
    }

    /**
     * Gets the 'controller.listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\EventListener\ControllerListener A Thelia\Core\EventListener\ControllerListener instance.
     * 
     * @throws InactiveScopeException when the 'controller.listener' service is requested while the 'request' scope is not active
     */
    protected function getController_ListenerService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('controller.listener', 'request');
        }

        return $this->services['controller.listener'] = $this->scopedServices['request']['controller.listener'] = new \Thelia\Core\EventListener\ControllerListener($this->get('thelia.securitycontext'));
    }

    /**
     * Gets the 'controller_resolver' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Controller\ControllerResolver A Thelia\Core\Controller\ControllerResolver instance.
     */
    protected function getControllerResolverService()
    {
        return $this->services['controller_resolver'] = new \Thelia\Core\Controller\ControllerResolver($this);
    }

    /**
     * Gets the 'cssembed.assetic.filter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Assetic\Filter\PhpCssEmbedFilter A Assetic\Filter\PhpCssEmbedFilter instance.
     */
    protected function getCssembed_Assetic_FilterService()
    {
        return $this->services['cssembed.assetic.filter'] = new \Assetic\Filter\PhpCssEmbedFilter();
    }

    /**
     * Gets the 'cssimport.assetic.filter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Assetic\Filter\CssImportFilter A Assetic\Filter\CssImportFilter instance.
     */
    protected function getCssimport_Assetic_FilterService()
    {
        return $this->services['cssimport.assetic.filter'] = new \Assetic\Filter\CssImportFilter();
    }

    /**
     * Gets the 'cssrewrite.assetic.filter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Assetic\Filter\CssRewriteFilter A Assetic\Filter\CssRewriteFilter instance.
     */
    protected function getCssrewrite_Assetic_FilterService()
    {
        return $this->services['cssrewrite.assetic.filter'] = new \Assetic\Filter\CssRewriteFilter();
    }

    /**
     * Gets the 'currency.converter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\CurrencyConverter\CurrencyConverter A Thelia\CurrencyConverter\CurrencyConverter instance.
     */
    protected function getCurrency_ConverterService()
    {
        $this->services['currency.converter'] = $instance = new \Thelia\CurrencyConverter\CurrencyConverter();

        $instance->setProvider($this->get('currency.converter.ecbprovider'));

        return $instance;
    }

    /**
     * Gets the 'currency.converter.ecbprovider' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\CurrencyConverter\Provider\ECBProvider A Thelia\CurrencyConverter\Provider\ECBProvider instance.
     */
    protected function getCurrency_Converter_EcbproviderService()
    {
        return $this->services['currency.converter.ecbprovider'] = new \Thelia\CurrencyConverter\Provider\ECBProvider();
    }

    /**
     * Gets the 'error.listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\EventListener\ErrorListener A Thelia\Core\EventListener\ErrorListener instance.
     * 
     * @throws InactiveScopeException when the 'error.listener' service is requested while the 'request' scope is not active
     */
    protected function getError_ListenerService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('error.listener', 'request');
        }

        return $this->services['error.listener'] = $this->scopedServices['request']['error.listener'] = new \Thelia\Core\EventListener\ErrorListener('dev', $this->get('thelia.parser'), $this->get('thelia.securitycontext'));
    }

    /**
     * Gets the 'esi' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\HttpCache\Esi A Symfony\Component\HttpKernel\HttpCache\Esi instance.
     */
    protected function getEsiService()
    {
        return $this->services['esi'] = new \Symfony\Component\HttpKernel\HttpCache\Esi();
    }

    /**
     * Gets the 'esi_listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\EsiListener A Symfony\Component\HttpKernel\EventListener\EsiListener instance.
     */
    protected function getEsiListenerService()
    {
        return $this->services['esi_listener'] = new \Symfony\Component\HttpKernel\EventListener\EsiListener($this->get('esi', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }

    /**
     * Gets the 'event_dispatcher' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\EventDispatcher\ContainerAwareEventDispatcher A Symfony\Component\EventDispatcher\ContainerAwareEventDispatcher instance.
     */
    protected function getEventDispatcherService()
    {
        $this->services['event_dispatcher'] = $instance = new \Symfony\Component\EventDispatcher\ContainerAwareEventDispatcher($this);

        $instance->addSubscriberService('thelia.action.module', 'Thelia\\Action\\Module');
        $instance->addSubscriberService('thelia.action.hook', 'Thelia\\Action\\Hook');
        $instance->addSubscriberService('thelia.action.modulehook', 'Thelia\\Action\\ModuleHook');
        $instance->addSubscriberService('thelia.action.order', 'Thelia\\Action\\Order');
        $instance->addSubscriberService('thelia.action.coupon', 'Thelia\\Action\\Coupon');
        $instance->addSubscriberService('thelia.action.httpexception', 'Thelia\\Action\\HttpException');
        $instance->addSubscriberService('thelia.action.redirectexception', 'Thelia\\Action\\RedirectException');
        $instance->addSubscriberService('thelia.action.customer', 'Thelia\\Action\\Customer');
        $instance->addSubscriberService('thelia.action.address', 'Thelia\\Action\\Address');
        $instance->addSubscriberService('thelia.action.administrator', 'Thelia\\Action\\Administrator');
        $instance->addSubscriberService('thelia.action.cart', 'Thelia\\Action\\Cart');
        $instance->addSubscriberService('thelia.action.file', 'Thelia\\Action\\File');
        $instance->addSubscriberService('thelia.action.image', 'Thelia\\Action\\Image');
        $instance->addSubscriberService('thelia.action.document', 'Thelia\\Action\\Document');
        $instance->addSubscriberService('thelia.action.category', 'Thelia\\Action\\Category');
        $instance->addSubscriberService('thelia.action.product', 'Thelia\\Action\\Product');
        $instance->addSubscriberService('thelia.action.product_sale_element', 'Thelia\\Action\\ProductSaleElement');
        $instance->addSubscriberService('thelia.action.config', 'Thelia\\Action\\Config');
        $instance->addSubscriberService('thelia.action.message', 'Thelia\\Action\\Message');
        $instance->addSubscriberService('thelia.action.currency', 'Thelia\\Action\\Currency');
        $instance->addSubscriberService('thelia.action.template', 'Thelia\\Action\\Template');
        $instance->addSubscriberService('thelia.action.attribute', 'Thelia\\Action\\Attribute');
        $instance->addSubscriberService('thelia.action.feature', 'Thelia\\Action\\Feature');
        $instance->addSubscriberService('thelia.action.attributeav', 'Thelia\\Action\\AttributeAv');
        $instance->addSubscriberService('thelia.action.featureav', 'Thelia\\Action\\FeatureAv');
        $instance->addSubscriberService('thelia.action.folder', 'Thelia\\Action\\Folder');
        $instance->addSubscriberService('thelia.action.taxrule', 'Thelia\\Action\\TaxRule');
        $instance->addSubscriberService('thelia.action.tax', 'Thelia\\Action\\Tax');
        $instance->addSubscriberService('thelia.action.content', 'Thelia\\Action\\Content');
        $instance->addSubscriberService('thelia.action.brand', 'Thelia\\Action\\Brand');
        $instance->addSubscriberService('thelia.action.pdf', 'Thelia\\Action\\Pdf');
        $instance->addSubscriberService('thelia.action.country', 'Thelia\\Action\\Country');
        $instance->addSubscriberService('thelia.action.area', 'Thelia\\Action\\Area');
        $instance->addSubscriberService('thelia.action.shippingzone', 'Thelia\\Action\\ShippingZone');
        $instance->addSubscriberService('thelia.action.cache', 'Thelia\\Action\\Cache');
        $instance->addSubscriberService('thelia.action.profile', 'Thelia\\Action\\Profile');
        $instance->addSubscriberService('thelia.action.mailing_system', 'Thelia\\Action\\MailingSystem');
        $instance->addSubscriberService('thelia.action.newsletter', 'Thelia\\Action\\Newsletter');
        $instance->addSubscriberService('thelia.action.lang', 'Thelia\\Action\\Lang');
        $instance->addSubscriberService('thelia.export.change_position', 'Thelia\\Action\\Export');
        $instance->addSubscriberService('thelia.import.change_position', 'Thelia\\Action\\Import');
        $instance->addSubscriberService('thelia.action.sale', 'Thelia\\Action\\Sale');
        $instance->addSubscriberService('thelia.metadata', 'Thelia\\Action\\MetaData');
        $instance->addSubscriberService('thelia.action.api', 'Thelia\\Action\\Api');
        $instance->addSubscriberService('thelia.action.customer_title', 'Thelia\\Action\\CustomerTitle');
        $instance->addSubscriberService('thelia.action.translation', 'Thelia\\Action\\Translation');
        $instance->addSubscriberService('esi_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\EsiListener');
        $instance->addSubscriberService('less.assetic.filter', 'Thelia\\Core\\Template\\Assets\\Filter\\LessDotPhpFilter');
        $instance->addSubscriberService('response.listener', 'Thelia\\Core\\EventListener\\ResponseListener');
        $instance->addSubscriberService('session.listener', 'Thelia\\Core\\EventListener\\SessionListener');
        $instance->addSubscriberService('controller.listener', 'Thelia\\Core\\EventListener\\ControllerListener');
        $instance->addSubscriberService('error.listener', 'Thelia\\Core\\EventListener\\ErrorListener');
        $instance->addSubscriberService('thelia.listener.view', 'Thelia\\Core\\EventListener\\ViewListener');
        $instance->addSubscriberService('listener.router', 'Symfony\\Component\\HttpKernel\\EventListener\\RouterListener');
        $instance->addSubscriberService('validators.translator', 'Thelia\\Core\\EventListener\\RequestListener');
        $instance->addListenerService('hook.1.main.head-bottom', array(0 => 'hooksearch.hook.front', 1 => 'onMainHeadBottom'), 999);
        $instance->addListenerService('hook.1.main.head-bottom', array(0 => 'hookcustomer.hook.front', 1 => 'onMainHeadBottom'), 998);
        $instance->addListenerService('hook.1.main.head-bottom', array(0 => 'hookcart.hook.front', 1 => 'onMainHeadBottom'), 997);
        $instance->addListenerService('hook.1.main.head-bottom', array(0 => 'hookanalytics.hook.front', 1 => 'onMainHeadBottom'), 995);
        $instance->addListenerService('hook.1.main.head-bottom', array(0 => 'hookkonfigurator.hook.front', 1 => 'onMainHeadBottom'), 994);
        $instance->addListenerService('hook.1.main.navbar-secondary', array(0 => 'hookcurrency.hook.front', 1 => 'onMainNavbarSecondary'), 999);
        $instance->addListenerService('hook.1.main.navbar-secondary', array(0 => 'hooklang.hook.front', 1 => 'onMainNavbarSecondary'), 998);
        $instance->addListenerService('hook.1.main.navbar-secondary', array(0 => 'hooksearch.hook.front', 1 => 'onMainNavbarSecondary'), 997);
        $instance->addListenerService('hook.1.main.navbar-secondary', array(0 => 'hookcustomer.hook.front', 1 => 'onMainNavbarSecondary'), 996);
        $instance->addListenerService('hook.1.main.navbar-secondary', array(0 => 'hookkonfigurator.hook.front', 1 => 'onMainHeadBottom'), 995);
        $instance->addListenerService('hook.1.main.navbar-secondary', array(0 => 'hookcart.hook.front', 1 => 'onMainHeadBottom'), 994);
        $instance->addListenerService('hook.1.main.navbar-secondary', array(0 => 'hookkonfigurator.hook.front', 1 => 'onMainNavbarSecondary'), 993);
        $instance->addListenerService('hook.1.main.navbar-secondary', array(0 => 'hookcart.hook.front', 1 => 'onMainNavbarSecondary'), 992);
        $instance->addListenerService('hook.1.main.navbar-primary', array(0 => 'hooknavigation.hook.front', 1 => 'onMainNavbarPrimary'), 998);
        $instance->addListenerService('hook.1.main.footer-body', array(0 => 'hookcontact.hook.front', 1 => 'onMainFooterBody'), 999);
        $instance->addListenerService('hook.1.main.footer-body', array(0 => 'hooklinks.hook.front', 1 => 'onMainFooterBody'), 998);
        $instance->addListenerService('hook.1.main.footer-body', array(0 => 'hooknavigation.hook.front', 1 => 'onMainFooterBody'), 997);
        $instance->addListenerService('hook.1.main.footer-body', array(0 => 'hooknewsletter.hook.front', 1 => 'onMainFooterBody'), 996);
        $instance->addListenerService('hook.1.main.footer-body', array(0 => 'hooksocial.hook.front', 1 => 'onMainFooterBody'), 995);
        $instance->addListenerService('hook.1.main.footer-bottom', array(0 => 'hooknavigation.hook.front', 1 => 'onMainFooterBottom'), 999);
        $instance->addListenerService('hook.1.home.body', array(0 => 'hookproductsnew.hook.front', 1 => 'onHomeBody'), 999);
        $instance->addListenerService('hook.1.home.body', array(0 => 'hookproductsoffer.hook.front', 1 => 'onHomeBody'), 998);
        $instance->addListenerService('hook.1.home.body', array(0 => 'carousel.hook', 1 => 'onHomeBody'), 997);
        $instance->addListenerService('hook.1.mini-cart', array(0 => 'hookcart.hook.front', 1 => 'onMiniCart'), 999);
        $instance->addListenerService('hook.2.main.before-content', array(0 => 'virtualproductcontrol.hook', 1 => 'onMainBeforeContent'), 999);
        $instance->addListenerService('hook.1.mini-konfigurator', array(0 => 'hookkonfigurator.hook.front', 1 => 'onMiniKonfigurator'), 999);

        return $instance;
    }

    /**
     * Gets the 'fragment.renderer.esi' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\Fragment\EsiFragmentRenderer A Symfony\Component\HttpKernel\Fragment\EsiFragmentRenderer instance.
     */
    protected function getFragment_Renderer_EsiService()
    {
        return $this->services['fragment.renderer.esi'] = new \Symfony\Component\HttpKernel\Fragment\EsiFragmentRenderer($this->get('esi'), $this->get('fragment.renderer.inline'));
    }

    /**
     * Gets the 'fragment.renderer.inline' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\Fragment\InlineFragmentRenderer A Symfony\Component\HttpKernel\Fragment\InlineFragmentRenderer instance.
     */
    protected function getFragment_Renderer_InlineService()
    {
        return $this->services['fragment.renderer.inline'] = new \Symfony\Component\HttpKernel\Fragment\InlineFragmentRenderer($this->get('http_kernel'));
    }

    /**
     * Gets the 'hookanalytics.hook.front' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \HookAnalytics\Hook\FrontHook A HookAnalytics\Hook\FrontHook instance.
     * 
     * @throws InactiveScopeException when the 'hookanalytics.hook.front' service is requested while the 'request' scope is not active
     */
    protected function getHookanalytics_Hook_FrontService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('hookanalytics.hook.front', 'request');
        }

        $this->services['hookanalytics.hook.front'] = $this->scopedServices['request']['hookanalytics.hook.front'] = $instance = new \HookAnalytics\Hook\FrontHook();

        $instance->module = $this->get('module.hookanalytics');
        $instance->parser = $this->get('thelia.parser');
        $instance->translator = $this->get('thelia.translator');
        $instance->assetsResolver = $this->get('thelia.parser.asset.resolver');
        $instance->dispatcher = $this->get('event_dispatcher');

        return $instance;
    }

    /**
     * Gets the 'hookcart.hook.front' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \HookCart\Hook\FrontHook A HookCart\Hook\FrontHook instance.
     * 
     * @throws InactiveScopeException when the 'hookcart.hook.front' service is requested while the 'request' scope is not active
     */
    protected function getHookcart_Hook_FrontService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('hookcart.hook.front', 'request');
        }

        $this->services['hookcart.hook.front'] = $this->scopedServices['request']['hookcart.hook.front'] = $instance = new \HookCart\Hook\FrontHook();

        $instance->module = $this->get('module.hookcart');
        $instance->parser = $this->get('thelia.parser');
        $instance->translator = $this->get('thelia.translator');
        $instance->assetsResolver = $this->get('thelia.parser.asset.resolver');
        $instance->dispatcher = $this->get('event_dispatcher');

        return $instance;
    }

    /**
     * Gets the 'hookcontact.hook.front' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \HookContact\Hook\FrontHook A HookContact\Hook\FrontHook instance.
     * 
     * @throws InactiveScopeException when the 'hookcontact.hook.front' service is requested while the 'request' scope is not active
     */
    protected function getHookcontact_Hook_FrontService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('hookcontact.hook.front', 'request');
        }

        $this->services['hookcontact.hook.front'] = $this->scopedServices['request']['hookcontact.hook.front'] = $instance = new \HookContact\Hook\FrontHook();

        $instance->module = $this->get('module.hookcontact');
        $instance->parser = $this->get('thelia.parser');
        $instance->translator = $this->get('thelia.translator');
        $instance->assetsResolver = $this->get('thelia.parser.asset.resolver');
        $instance->dispatcher = $this->get('event_dispatcher');

        return $instance;
    }

    /**
     * Gets the 'hookcurrency.hook.front' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \HookCurrency\Hook\FrontHook A HookCurrency\Hook\FrontHook instance.
     * 
     * @throws InactiveScopeException when the 'hookcurrency.hook.front' service is requested while the 'request' scope is not active
     */
    protected function getHookcurrency_Hook_FrontService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('hookcurrency.hook.front', 'request');
        }

        $this->services['hookcurrency.hook.front'] = $this->scopedServices['request']['hookcurrency.hook.front'] = $instance = new \HookCurrency\Hook\FrontHook();

        $instance->module = $this->get('module.hookcurrency');
        $instance->parser = $this->get('thelia.parser');
        $instance->translator = $this->get('thelia.translator');
        $instance->assetsResolver = $this->get('thelia.parser.asset.resolver');
        $instance->dispatcher = $this->get('event_dispatcher');

        return $instance;
    }

    /**
     * Gets the 'hookcustomer.hook.front' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \HookCustomer\Hook\FrontHook A HookCustomer\Hook\FrontHook instance.
     * 
     * @throws InactiveScopeException when the 'hookcustomer.hook.front' service is requested while the 'request' scope is not active
     */
    protected function getHookcustomer_Hook_FrontService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('hookcustomer.hook.front', 'request');
        }

        $this->services['hookcustomer.hook.front'] = $this->scopedServices['request']['hookcustomer.hook.front'] = $instance = new \HookCustomer\Hook\FrontHook();

        $instance->module = $this->get('module.hookcustomer');
        $instance->parser = $this->get('thelia.parser');
        $instance->translator = $this->get('thelia.translator');
        $instance->assetsResolver = $this->get('thelia.parser.asset.resolver');
        $instance->dispatcher = $this->get('event_dispatcher');

        return $instance;
    }

    /**
     * Gets the 'hookkonfigurator.hook.front' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \HookKonfigurator\Hook\Front A HookKonfigurator\Hook\Front instance.
     * 
     * @throws InactiveScopeException when the 'hookkonfigurator.hook.front' service is requested while the 'request' scope is not active
     */
    protected function getHookkonfigurator_Hook_FrontService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('hookkonfigurator.hook.front', 'request');
        }

        $this->services['hookkonfigurator.hook.front'] = $this->scopedServices['request']['hookkonfigurator.hook.front'] = $instance = new \HookKonfigurator\Hook\Front();

        $instance->module = $this->get('module.hookkonfigurator');
        $instance->parser = $this->get('thelia.parser');
        $instance->translator = $this->get('thelia.translator');
        $instance->assetsResolver = $this->get('thelia.parser.asset.resolver');
        $instance->dispatcher = $this->get('event_dispatcher');

        return $instance;
    }

    /**
     * Gets the 'hooklang.hook.front' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \HookLang\Hook\FrontHook A HookLang\Hook\FrontHook instance.
     * 
     * @throws InactiveScopeException when the 'hooklang.hook.front' service is requested while the 'request' scope is not active
     */
    protected function getHooklang_Hook_FrontService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('hooklang.hook.front', 'request');
        }

        $this->services['hooklang.hook.front'] = $this->scopedServices['request']['hooklang.hook.front'] = $instance = new \HookLang\Hook\FrontHook();

        $instance->module = $this->get('module.hooklang');
        $instance->parser = $this->get('thelia.parser');
        $instance->translator = $this->get('thelia.translator');
        $instance->assetsResolver = $this->get('thelia.parser.asset.resolver');
        $instance->dispatcher = $this->get('event_dispatcher');

        return $instance;
    }

    /**
     * Gets the 'hooklinks.hook.front' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \HookLinks\Hook\FrontHook A HookLinks\Hook\FrontHook instance.
     * 
     * @throws InactiveScopeException when the 'hooklinks.hook.front' service is requested while the 'request' scope is not active
     */
    protected function getHooklinks_Hook_FrontService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('hooklinks.hook.front', 'request');
        }

        $this->services['hooklinks.hook.front'] = $this->scopedServices['request']['hooklinks.hook.front'] = $instance = new \HookLinks\Hook\FrontHook();

        $instance->module = $this->get('module.hooklinks');
        $instance->parser = $this->get('thelia.parser');
        $instance->translator = $this->get('thelia.translator');
        $instance->assetsResolver = $this->get('thelia.parser.asset.resolver');
        $instance->dispatcher = $this->get('event_dispatcher');

        return $instance;
    }

    /**
     * Gets the 'hooknavigation.hook.front' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \HookNavigation\Hook\FrontHook A HookNavigation\Hook\FrontHook instance.
     * 
     * @throws InactiveScopeException when the 'hooknavigation.hook.front' service is requested while the 'request' scope is not active
     */
    protected function getHooknavigation_Hook_FrontService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('hooknavigation.hook.front', 'request');
        }

        $this->services['hooknavigation.hook.front'] = $this->scopedServices['request']['hooknavigation.hook.front'] = $instance = new \HookNavigation\Hook\FrontHook();

        $instance->module = $this->get('module.hooknavigation');
        $instance->parser = $this->get('thelia.parser');
        $instance->translator = $this->get('thelia.translator');
        $instance->assetsResolver = $this->get('thelia.parser.asset.resolver');
        $instance->dispatcher = $this->get('event_dispatcher');

        return $instance;
    }

    /**
     * Gets the 'hooknewsletter.hook.front' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \HookNewsletter\Hook\FrontHook A HookNewsletter\Hook\FrontHook instance.
     * 
     * @throws InactiveScopeException when the 'hooknewsletter.hook.front' service is requested while the 'request' scope is not active
     */
    protected function getHooknewsletter_Hook_FrontService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('hooknewsletter.hook.front', 'request');
        }

        $this->services['hooknewsletter.hook.front'] = $this->scopedServices['request']['hooknewsletter.hook.front'] = $instance = new \HookNewsletter\Hook\FrontHook();

        $instance->module = $this->get('module.hooknewsletter');
        $instance->parser = $this->get('thelia.parser');
        $instance->translator = $this->get('thelia.translator');
        $instance->assetsResolver = $this->get('thelia.parser.asset.resolver');
        $instance->dispatcher = $this->get('event_dispatcher');

        return $instance;
    }

    /**
     * Gets the 'hookproductsnew.hook.front' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \HookProductsNew\Hook\FrontHook A HookProductsNew\Hook\FrontHook instance.
     * 
     * @throws InactiveScopeException when the 'hookproductsnew.hook.front' service is requested while the 'request' scope is not active
     */
    protected function getHookproductsnew_Hook_FrontService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('hookproductsnew.hook.front', 'request');
        }

        $this->services['hookproductsnew.hook.front'] = $this->scopedServices['request']['hookproductsnew.hook.front'] = $instance = new \HookProductsNew\Hook\FrontHook();

        $instance->module = $this->get('module.hookproductsnew');
        $instance->parser = $this->get('thelia.parser');
        $instance->translator = $this->get('thelia.translator');
        $instance->assetsResolver = $this->get('thelia.parser.asset.resolver');
        $instance->dispatcher = $this->get('event_dispatcher');

        return $instance;
    }

    /**
     * Gets the 'hookproductsoffer.hook.front' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \HookProductsOffer\Hook\FrontHook A HookProductsOffer\Hook\FrontHook instance.
     * 
     * @throws InactiveScopeException when the 'hookproductsoffer.hook.front' service is requested while the 'request' scope is not active
     */
    protected function getHookproductsoffer_Hook_FrontService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('hookproductsoffer.hook.front', 'request');
        }

        $this->services['hookproductsoffer.hook.front'] = $this->scopedServices['request']['hookproductsoffer.hook.front'] = $instance = new \HookProductsOffer\Hook\FrontHook();

        $instance->module = $this->get('module.hookproductsoffer');
        $instance->parser = $this->get('thelia.parser');
        $instance->translator = $this->get('thelia.translator');
        $instance->assetsResolver = $this->get('thelia.parser.asset.resolver');
        $instance->dispatcher = $this->get('event_dispatcher');

        return $instance;
    }

    /**
     * Gets the 'hooksearch.hook.front' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \HookSearch\Hook\FrontHook A HookSearch\Hook\FrontHook instance.
     * 
     * @throws InactiveScopeException when the 'hooksearch.hook.front' service is requested while the 'request' scope is not active
     */
    protected function getHooksearch_Hook_FrontService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('hooksearch.hook.front', 'request');
        }

        $this->services['hooksearch.hook.front'] = $this->scopedServices['request']['hooksearch.hook.front'] = $instance = new \HookSearch\Hook\FrontHook();

        $instance->module = $this->get('module.hooksearch');
        $instance->parser = $this->get('thelia.parser');
        $instance->translator = $this->get('thelia.translator');
        $instance->assetsResolver = $this->get('thelia.parser.asset.resolver');
        $instance->dispatcher = $this->get('event_dispatcher');

        return $instance;
    }

    /**
     * Gets the 'hooksocial.hook.front' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \HookSocial\Hook\FrontHook A HookSocial\Hook\FrontHook instance.
     * 
     * @throws InactiveScopeException when the 'hooksocial.hook.front' service is requested while the 'request' scope is not active
     */
    protected function getHooksocial_Hook_FrontService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('hooksocial.hook.front', 'request');
        }

        $this->services['hooksocial.hook.front'] = $this->scopedServices['request']['hooksocial.hook.front'] = $instance = new \HookSocial\Hook\FrontHook();

        $instance->module = $this->get('module.hooksocial');
        $instance->parser = $this->get('thelia.parser');
        $instance->translator = $this->get('thelia.translator');
        $instance->assetsResolver = $this->get('thelia.parser.asset.resolver');
        $instance->dispatcher = $this->get('event_dispatcher');

        return $instance;
    }

    /**
     * Gets the 'http_kernel' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\TheliaHttpKernel A Thelia\Core\TheliaHttpKernel instance.
     */
    protected function getHttpKernelService()
    {
        return $this->services['http_kernel'] = $this->get('stack_factory')->resolve($this->get('base_http_kernel'));
    }

    /**
     * Gets the 'initparam.middleware' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Stack\ParamInitMiddleware A Thelia\Core\Stack\ParamInitMiddleware instance.
     */
    protected function getInitparam_MiddlewareService()
    {
        return $this->services['initparam.middleware'] = new \Thelia\Core\Stack\ParamInitMiddleware($this->get('thelia.url.manager'), $this->get('thelia.translator'), $this->get('event_dispatcher'));
    }

    /**
     * Gets the 'kernel' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @throws RuntimeException always since this service is expected to be injected dynamically
     */
    protected function getKernelService()
    {
        throw new RuntimeException('You have requested a synthetic service ("kernel"). The DIC does not know how to construct this service.');
    }

    /**
     * Gets the 'less.assetic.filter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Template\Assets\Filter\LessDotPhpFilter A Thelia\Core\Template\Assets\Filter\LessDotPhpFilter instance.
     */
    protected function getLess_Assetic_FilterService()
    {
        return $this->services['less.assetic.filter'] = new \Thelia\Core\Template\Assets\Filter\LessDotPhpFilter('dev');
    }

    /**
     * Gets the 'less_legacy.assetic.filter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Assetic\Filter\LessphpFilter A Assetic\Filter\LessphpFilter instance.
     */
    protected function getLessLegacy_Assetic_FilterService()
    {
        return $this->services['less_legacy.assetic.filter'] = new \Assetic\Filter\LessphpFilter('less_legacy');
    }

    /**
     * Gets the 'listener.router' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\RouterListener A Symfony\Component\HttpKernel\EventListener\RouterListener instance.
     */
    protected function getListener_RouterService()
    {
        return $this->services['listener.router'] = new \Symfony\Component\HttpKernel\EventListener\RouterListener($this->get('router.chainrequest'));
    }

    /**
     * Gets the 'mailer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Mailer\MailerFactory A Thelia\Mailer\MailerFactory instance.
     * 
     * @throws InactiveScopeException when the 'mailer' service is requested while the 'request' scope is not active
     */
    protected function getMailerService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('mailer', 'request');
        }

        return $this->services['mailer'] = $this->scopedServices['request']['mailer'] = new \Thelia\Mailer\MailerFactory($this->get('event_dispatcher'), $this->get('thelia.parser'));
    }

    /**
     * Gets the 'module.carousel' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Carousel\Carousel A Carousel\Carousel instance.
     */
    protected function getModule_CarouselService()
    {
        $this->services['module.carousel'] = $instance = new \Carousel\Carousel();

        $instance->setContainer($this);

        return $instance;
    }

    /**
     * Gets the 'module.front' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Front\Front A Front\Front instance.
     */
    protected function getModule_FrontService()
    {
        $this->services['module.front'] = $instance = new \Front\Front();

        $instance->setContainer($this);

        return $instance;
    }

    /**
     * Gets the 'module.hookanalytics' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \HookAnalytics\HookAnalytics A HookAnalytics\HookAnalytics instance.
     */
    protected function getModule_HookanalyticsService()
    {
        $this->services['module.hookanalytics'] = $instance = new \HookAnalytics\HookAnalytics();

        $instance->setContainer($this);

        return $instance;
    }

    /**
     * Gets the 'module.hookcart' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \HookCart\HookCart A HookCart\HookCart instance.
     */
    protected function getModule_HookcartService()
    {
        $this->services['module.hookcart'] = $instance = new \HookCart\HookCart();

        $instance->setContainer($this);

        return $instance;
    }

    /**
     * Gets the 'module.hookcontact' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \HookContact\HookContact A HookContact\HookContact instance.
     */
    protected function getModule_HookcontactService()
    {
        $this->services['module.hookcontact'] = $instance = new \HookContact\HookContact();

        $instance->setContainer($this);

        return $instance;
    }

    /**
     * Gets the 'module.hookcurrency' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \HookCurrency\HookCurrency A HookCurrency\HookCurrency instance.
     */
    protected function getModule_HookcurrencyService()
    {
        $this->services['module.hookcurrency'] = $instance = new \HookCurrency\HookCurrency();

        $instance->setContainer($this);

        return $instance;
    }

    /**
     * Gets the 'module.hookcustomer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \HookCustomer\HookCustomer A HookCustomer\HookCustomer instance.
     */
    protected function getModule_HookcustomerService()
    {
        $this->services['module.hookcustomer'] = $instance = new \HookCustomer\HookCustomer();

        $instance->setContainer($this);

        return $instance;
    }

    /**
     * Gets the 'module.hookkonfigurator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \HookKonfigurator\HookKonfigurator A HookKonfigurator\HookKonfigurator instance.
     */
    protected function getModule_HookkonfiguratorService()
    {
        $this->services['module.hookkonfigurator'] = $instance = new \HookKonfigurator\HookKonfigurator();

        $instance->setContainer($this);

        return $instance;
    }

    /**
     * Gets the 'module.hooklang' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \HookLang\HookLang A HookLang\HookLang instance.
     */
    protected function getModule_HooklangService()
    {
        $this->services['module.hooklang'] = $instance = new \HookLang\HookLang();

        $instance->setContainer($this);

        return $instance;
    }

    /**
     * Gets the 'module.hooklinks' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \HookLinks\HookLinks A HookLinks\HookLinks instance.
     */
    protected function getModule_HooklinksService()
    {
        $this->services['module.hooklinks'] = $instance = new \HookLinks\HookLinks();

        $instance->setContainer($this);

        return $instance;
    }

    /**
     * Gets the 'module.hooknavigation' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \HookNavigation\HookNavigation A HookNavigation\HookNavigation instance.
     */
    protected function getModule_HooknavigationService()
    {
        $this->services['module.hooknavigation'] = $instance = new \HookNavigation\HookNavigation();

        $instance->setContainer($this);

        return $instance;
    }

    /**
     * Gets the 'module.hooknewsletter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \HookNewsletter\HookNewsletter A HookNewsletter\HookNewsletter instance.
     */
    protected function getModule_HooknewsletterService()
    {
        $this->services['module.hooknewsletter'] = $instance = new \HookNewsletter\HookNewsletter();

        $instance->setContainer($this);

        return $instance;
    }

    /**
     * Gets the 'module.hookproductsnew' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \HookProductsNew\HookProductsNew A HookProductsNew\HookProductsNew instance.
     */
    protected function getModule_HookproductsnewService()
    {
        $this->services['module.hookproductsnew'] = $instance = new \HookProductsNew\HookProductsNew();

        $instance->setContainer($this);

        return $instance;
    }

    /**
     * Gets the 'module.hookproductsoffer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \HookProductsOffer\HookProductsOffer A HookProductsOffer\HookProductsOffer instance.
     */
    protected function getModule_HookproductsofferService()
    {
        $this->services['module.hookproductsoffer'] = $instance = new \HookProductsOffer\HookProductsOffer();

        $instance->setContainer($this);

        return $instance;
    }

    /**
     * Gets the 'module.hooksearch' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \HookSearch\HookSearch A HookSearch\HookSearch instance.
     */
    protected function getModule_HooksearchService()
    {
        $this->services['module.hooksearch'] = $instance = new \HookSearch\HookSearch();

        $instance->setContainer($this);

        return $instance;
    }

    /**
     * Gets the 'module.hooksocial' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \HookSocial\HookSocial A HookSocial\HookSocial instance.
     */
    protected function getModule_HooksocialService()
    {
        $this->services['module.hooksocial'] = $instance = new \HookSocial\HookSocial();

        $instance->setContainer($this);

        return $instance;
    }

    /**
     * Gets the 'module.theliasmarty' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \TheliaSmarty\TheliaSmarty A TheliaSmarty\TheliaSmarty instance.
     */
    protected function getModule_TheliasmartyService()
    {
        $this->services['module.theliasmarty'] = $instance = new \TheliaSmarty\TheliaSmarty();

        $instance->setContainer($this);

        return $instance;
    }

    /**
     * Gets the 'module.virtualproductcontrol' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \VirtualProductControl\VirtualProductControl A VirtualProductControl\VirtualProductControl instance.
     */
    protected function getModule_VirtualproductcontrolService()
    {
        $this->services['module.virtualproductcontrol'] = $instance = new \VirtualProductControl\VirtualProductControl();

        $instance->setContainer($this);

        return $instance;
    }

    /**
     * Gets the 'request' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @throws RuntimeException always since this service is expected to be injected dynamically
     * @throws InactiveScopeException when the 'request' service is requested while the 'request' scope is not active
     */
    protected function getRequestService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('request', 'request');
        }

        throw new RuntimeException('You have requested a synthetic service ("request"). The DIC does not know how to construct this service.');
    }

    /**
     * Gets the 'request.context' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Routing\RequestContext A Symfony\Component\Routing\RequestContext instance.
     */
    protected function getRequest_ContextService()
    {
        return $this->services['request.context'] = new \Symfony\Component\Routing\RequestContext();
    }

    /**
     * Gets the 'response.listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\EventListener\ResponseListener A Thelia\Core\EventListener\ResponseListener instance.
     */
    protected function getResponse_ListenerService()
    {
        return $this->services['response.listener'] = new \Thelia\Core\EventListener\ResponseListener();
    }

    /**
     * Gets the 'router.admin' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Routing\Router A Symfony\Component\Routing\Router instance.
     */
    protected function getRouter_AdminService()
    {
        $this->services['router.admin'] = $instance = new \Symfony\Component\Routing\Router($this->get('router.xmlloader'), 'admin.xml', array('cache_dir' => __DIR__, 'debug' => true), $this->get('request.context'));

        $instance->setOption('matcher_cache_class', 'ProjectUrlMatcherrouter_Admin');
        $instance->setOption('generator_cache_class', 'ProjectUrlGeneratorrouter_Admin');

        return $instance;
    }

    /**
     * Gets the 'router.api' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Routing\Router A Symfony\Component\Routing\Router instance.
     */
    protected function getRouter_ApiService()
    {
        $this->services['router.api'] = $instance = new \Symfony\Component\Routing\Router($this->get('router.xmlloader'), 'api.xml', array('cache_dir' => __DIR__, 'debug' => true), $this->get('request.context'));

        $instance->setOption('matcher_cache_class', 'ProjectUrlMatcherrouter_Api');
        $instance->setOption('generator_cache_class', 'ProjectUrlGeneratorrouter_Api');

        return $instance;
    }

    /**
     * Gets the 'router.carousel' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Routing\Router A Symfony\Component\Routing\Router instance.
     */
    protected function getRouter_CarouselService()
    {
        return $this->services['router.carousel'] = new \Symfony\Component\Routing\Router($this->get('router.module.xmlloader'), ($this->targetDirs[2].'\\local\\modules\\Carousel\\Config\\routing.xml'), array('cache_dir' => __DIR__, 'debug' => true, 'matcher_cache_class' => 'ProjectUrlMatcherCarousel', 'generator_cache_class' => 'ProjectUrlGeneratorCarousel'), $this->get('request.context'));
    }

    /**
     * Gets the 'router.chainrequest' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Cmf\Component\Routing\ChainRouter A Symfony\Cmf\Component\Routing\ChainRouter instance.
     */
    protected function getRouter_ChainrequestService()
    {
        $this->services['router.chainrequest'] = $instance = new \Symfony\Cmf\Component\Routing\ChainRouter();

        $instance->setContext($this->get('request.context'));
        $instance->add($this->get('router.admin'), 0);
        $instance->add($this->get('router.api'), 0);
        $instance->add($this->get('router.rewrite'), 255);
        $instance->add($this->get('router.front'), 128);
        $instance->add($this->get('router.carousel'), 150);
        $instance->add($this->get('router.hookanalytics'), 150);
        $instance->add($this->get('router.hooknavigation'), 150);
        $instance->add($this->get('router.hooksocial'), 150);

        return $instance;
    }

    /**
     * Gets the 'router.filelocator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Config\FileLocator A Symfony\Component\Config\FileLocator instance.
     */
    protected function getRouter_FilelocatorService()
    {
        return $this->services['router.filelocator'] = new \Symfony\Component\Config\FileLocator(($this->targetDirs[2].'\\core\\lib\\Thelia/Config/Resources/routing'));
    }

    /**
     * Gets the 'router.front' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Routing\Router A Symfony\Component\Routing\Router instance.
     */
    protected function getRouter_FrontService()
    {
        $this->services['router.front'] = $instance = new \Symfony\Component\Routing\Router($this->get('router.module.xmlloader'), 'Front/Config/front.xml', array('cache_dir' => __DIR__, 'debug' => true), $this->get('request.context'));

        $instance->setOption('matcher_cache_class', 'ProjectUrlMatcherrouter_Front');
        $instance->setOption('generator_cache_class', 'ProjectUrlGeneratorrouter_Front');

        return $instance;
    }

    /**
     * Gets the 'router.hookanalytics' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Routing\Router A Symfony\Component\Routing\Router instance.
     */
    protected function getRouter_HookanalyticsService()
    {
        return $this->services['router.hookanalytics'] = new \Symfony\Component\Routing\Router($this->get('router.module.xmlloader'), ($this->targetDirs[2].'\\local\\modules\\HookAnalytics\\Config\\routing.xml'), array('cache_dir' => __DIR__, 'debug' => true, 'matcher_cache_class' => 'ProjectUrlMatcherHookAnalytics', 'generator_cache_class' => 'ProjectUrlGeneratorHookAnalytics'), $this->get('request.context'));
    }

    /**
     * Gets the 'router.hooknavigation' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Routing\Router A Symfony\Component\Routing\Router instance.
     */
    protected function getRouter_HooknavigationService()
    {
        return $this->services['router.hooknavigation'] = new \Symfony\Component\Routing\Router($this->get('router.module.xmlloader'), ($this->targetDirs[2].'\\local\\modules\\HookNavigation\\Config\\routing.xml'), array('cache_dir' => __DIR__, 'debug' => true, 'matcher_cache_class' => 'ProjectUrlMatcherHookNavigation', 'generator_cache_class' => 'ProjectUrlGeneratorHookNavigation'), $this->get('request.context'));
    }

    /**
     * Gets the 'router.hooksocial' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Routing\Router A Symfony\Component\Routing\Router instance.
     */
    protected function getRouter_HooksocialService()
    {
        return $this->services['router.hooksocial'] = new \Symfony\Component\Routing\Router($this->get('router.module.xmlloader'), ($this->targetDirs[2].'\\local\\modules\\HookSocial\\Config\\routing.xml'), array('cache_dir' => __DIR__, 'debug' => true, 'matcher_cache_class' => 'ProjectUrlMatcherHookSocial', 'generator_cache_class' => 'ProjectUrlGeneratorHookSocial'), $this->get('request.context'));
    }

    /**
     * Gets the 'router.module.filelocator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Config\FileLocator A Symfony\Component\Config\FileLocator instance.
     */
    protected function getRouter_Module_FilelocatorService()
    {
        return $this->services['router.module.filelocator'] = new \Symfony\Component\Config\FileLocator(($this->targetDirs[2].'\\local\\modules\\'));
    }

    /**
     * Gets the 'router.module.xmlloader' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Routing\Loader\XmlFileLoader A Symfony\Component\Routing\Loader\XmlFileLoader instance.
     */
    protected function getRouter_Module_XmlloaderService()
    {
        return $this->services['router.module.xmlloader'] = new \Symfony\Component\Routing\Loader\XmlFileLoader($this->get('router.module.filelocator'));
    }

    /**
     * Gets the 'router.rewrite' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Routing\RewritingRouter A Thelia\Core\Routing\RewritingRouter instance.
     */
    protected function getRouter_RewriteService()
    {
        $this->services['router.rewrite'] = $instance = new \Thelia\Core\Routing\RewritingRouter();

        $instance->setOption('matcher_cache_class', 'ProjectUrlMatcherrouter_Rewrite');
        $instance->setOption('generator_cache_class', 'ProjectUrlGeneratorrouter_Rewrite');

        return $instance;
    }

    /**
     * Gets the 'router.xmlloader' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Routing\Loader\XmlFileLoader A Symfony\Component\Routing\Loader\XmlFileLoader instance.
     */
    protected function getRouter_XmlloaderService()
    {
        return $this->services['router.xmlloader'] = new \Symfony\Component\Routing\Loader\XmlFileLoader($this->get('router.filelocator'));
    }

    /**
     * Gets the 'sass.assetic.filter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Assetic\Filter\Sass\SassFilter A Assetic\Filter\Sass\SassFilter instance.
     */
    protected function getSass_Assetic_FilterService()
    {
        return $this->services['sass.assetic.filter'] = new \Assetic\Filter\Sass\SassFilter();
    }

    /**
     * Gets the 'service_container' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @throws RuntimeException always since this service is expected to be injected dynamically
     */
    protected function getServiceContainerService()
    {
        throw new RuntimeException('You have requested a synthetic service ("service_container"). The DIC does not know how to construct this service.');
    }

    /**
     * Gets the 'session.listener' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\EventListener\SessionListener A Thelia\Core\EventListener\SessionListener instance.
     */
    protected function getSession_ListenerService()
    {
        return $this->services['session.listener'] = new \Thelia\Core\EventListener\SessionListener();
    }

    /**
     * Gets the 'session.middleware' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Stack\SessionMiddleware A Thelia\Core\Stack\SessionMiddleware instance.
     */
    protected function getSession_MiddlewareService()
    {
        return $this->services['session.middleware'] = new \Thelia\Core\Stack\SessionMiddleware($this->get('event_dispatcher'), __DIR__, true, 'dev');
    }

    /**
     * Gets the 'smart.plugin.form' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \TheliaSmarty\Template\Plugins\Form A TheliaSmarty\Template\Plugins\Form instance.
     * 
     * @throws InactiveScopeException when the 'smart.plugin.form' service is requested while the 'request' scope is not active
     */
    protected function getSmart_Plugin_FormService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('smart.plugin.form', 'request');
        }

        $this->services['smart.plugin.form'] = $this->scopedServices['request']['smart.plugin.form'] = $instance = new \TheliaSmarty\Template\Plugins\Form($this->get('thelia.form_factory'), $this->get('thelia.parser.context'), $this->get('thelia.parser'));

        $instance->setFormDefinition(array('thelia.api.empty' => 'Thelia\\Form\\Api\\ApiEmptyForm', 'thelia.api.customer.create' => 'Thelia\\Form\\Api\\Customer\\CustomerCreateForm', 'thelia.api.customer.update' => 'Thelia\\Form\\Api\\Customer\\CustomerUpdateForm', 'thelia.api.customer.login' => 'Thelia\\Form\\Api\\Customer\\CustomerLogin', 'thelia.api.category.create' => 'Thelia\\Form\\Api\\Category\\CategoryCreationForm', 'thelia.api.category.update' => 'Thelia\\Form\\Api\\Category\\CategoryModificationForm', 'thelia.api.product_sale_elements' => 'Thelia\\Form\\Api\\ProductSaleElements\\ProductSaleElementsForm', 'thelia.api.product.creation' => 'Thelia\\Form\\Api\\Product\\ProductCreationForm', 'thelia.api.product.modification' => 'Thelia\\Form\\Api\\Product\\ProductModificationForm', 'thelia.front.customer.login' => 'Thelia\\Form\\CustomerLogin', 'thelia.front.customer.lostpassword' => 'Thelia\\Form\\CustomerLostPasswordForm', 'thelia.front.customer.create' => 'Thelia\\Form\\CustomerCreateForm', 'thelia.front.customer.profile.update' => 'Thelia\\Form\\CustomerProfileUpdateForm', 'thelia.front.customer.password.update' => 'Thelia\\Form\\CustomerPasswordUpdateForm', 'thelia.front.address.create' => 'Thelia\\Form\\AddressCreateForm', 'thelia.front.address.update' => 'Thelia\\Form\\AddressUpdateForm', 'thelia.front.contact' => 'Thelia\\Form\\ContactForm', 'thelia.front.newsletter' => 'Thelia\\Form\\NewsletterForm', 'thelia.admin.login' => 'Thelia\\Form\\AdminLogin', 'thelia.admin.seo' => 'Thelia\\Form\\SeoForm', 'thelia.admin.customer.create' => 'Thelia\\Form\\CustomerCreateForm', 'thelia.admin.customer.update' => 'Thelia\\Form\\CustomerUpdateForm', 'thelia.admin.address.create' => 'Thelia\\Form\\AddressCreateForm', 'thelia.admin.address.update' => 'Thelia\\Form\\AddressUpdateForm', 'thelia.admin.category.creation' => 'Thelia\\Form\\CategoryCreationForm', 'thelia.admin.category.modification' => 'Thelia\\Form\\CategoryModificationForm', 'thelia.admin.category.image.modification' => 'Thelia\\Form\\CategoryImageModification', 'thelia.admin.category.document.modification' => 'Thelia\\Form\\CategoryDocumentModification', 'thelia.admin.product.creation' => 'Thelia\\Form\\ProductCreationForm', 'thelia.admin.product.clone' => 'Thelia\\Form\\ProductCloneForm', 'thelia.admin.product.modification' => 'Thelia\\Form\\ProductModificationForm', 'thelia.admin.product.details.modification' => 'Thelia\\Form\\ProductDetailsModificationForm', 'thelia.admin.product.image.modification' => 'Thelia\\Form\\ProductImageModification', 'thelia.admin.product.document.modification' => 'Thelia\\Form\\ProductDocumentModification', 'thelia.admin.product_sale_element.update' => 'Thelia\\Form\\ProductSaleElementUpdateForm', 'thelia.admin.product_default_sale_element.update' => 'Thelia\\Form\\ProductDefaultSaleElementUpdateForm', 'thelia.admin.product_combination.build' => 'Thelia\\Form\\ProductCombinationGenerationForm', 'thelia.admin.product.deletion' => 'Thelia\\Form\\ProductModificationForm', 'thelia.admin.folder.creation' => 'Thelia\\Form\\FolderCreationForm', 'thelia.admin.folder.modification' => 'Thelia\\Form\\FolderModificationForm', 'thelia.admin.folder.image.modification' => 'Thelia\\Form\\FolderImageModification', 'thelia.admin.folder.document.modification' => 'Thelia\\Form\\FolderDocumentModification', 'thelia.admin.content.creation' => 'Thelia\\Form\\ContentCreationForm', 'thelia.admin.content.modification' => 'Thelia\\Form\\ContentModificationForm', 'thelia.admin.content.image.modification' => 'Thelia\\Form\\ContentImageModification', 'thelia.admin.content.document.modification' => 'Thelia\\Form\\ContentDocumentModification', 'thelia.admin.brand.creation' => 'Thelia\\Form\\Brand\\BrandCreationForm', 'thelia.admin.brand.modification' => 'Thelia\\Form\\Brand\\BrandModificationForm', 'thelia.admin.brand.image.modification' => 'Thelia\\Form\\Brand\\BrandImageModification', 'thelia.admin.brand.document.modification' => 'Thelia\\Form\\Brand\\BrandDocumentModification', 'thelia.cart.add' => 'Thelia\\Form\\CartAdd', 'thelia.order.delivery' => 'Thelia\\Form\\OrderDelivery', 'thelia.order.payment' => 'Thelia\\Form\\OrderPayment', 'thelia.order.update.address' => 'Thelia\\Form\\OrderUpdateAddress', 'thelia.order.coupon' => 'Thelia\\Form\\CouponCode', 'thelia.admin.config.creation' => 'Thelia\\Form\\ConfigCreationForm', 'thelia.admin.config.modification' => 'Thelia\\Form\\ConfigModificationForm', 'thelia.admin.message.creation' => 'Thelia\\Form\\MessageCreationForm', 'thelia.admin.message.modification' => 'Thelia\\Form\\MessageModificationForm', 'thelia.admin.currency.creation' => 'Thelia\\Form\\CurrencyCreationForm', 'thelia.admin.currency.modification' => 'Thelia\\Form\\CurrencyModificationForm', 'thelia.admin.coupon.creation' => 'Thelia\\Form\\CouponCreationForm', 'thelia.admin.attribute.creation' => 'Thelia\\Form\\AttributeCreationForm', 'thelia.admin.attribute.modification' => 'Thelia\\Form\\AttributeModificationForm', 'thelia.admin.feature.creation' => 'Thelia\\Form\\FeatureCreationForm', 'thelia.admin.feature.modification' => 'Thelia\\Form\\FeatureModificationForm', 'thelia.admin.attributeav.creation' => 'Thelia\\Form\\AttributeAvCreationForm', 'thelia.admin.attributeav.modification' => 'Thelia\\Form\\AttributeAvCreationForm', 'thelia.admin.featureav.creation' => 'Thelia\\Form\\FeatureAvCreationForm', 'thelia.admin.taxrule.modification' => 'Thelia\\Form\\TaxRuleModificationForm', 'thelia.admin.taxrule.taxlistupdate' => 'Thelia\\Form\\TaxRuleTaxListUpdateForm', 'thelia.admin.taxrule.add' => 'Thelia\\Form\\TaxRuleCreationForm', 'thelia.admin.tax.modification' => 'Thelia\\Form\\TaxModificationForm', 'thelia.admin.tax.taxlistupdate' => 'Thelia\\Form\\TaxTaxListUpdateForm', 'thelia.admin.tax.add' => 'Thelia\\Form\\TaxCreationForm', 'thelia.admin.profile.add' => 'Thelia\\Form\\ProfileCreationForm', 'thelia.admin.profile.modification' => 'Thelia\\Form\\ProfileModificationForm', 'thelia.admin.profile.resource-access.modification' => 'Thelia\\Form\\ProfileUpdateResourceAccessForm', 'thelia.admin.profile.module-access.modification' => 'Thelia\\Form\\ProfileUpdateModuleAccessForm', 'thelia.admin.administrator.add' => 'Thelia\\Form\\AdministratorCreationForm', 'thelia.admin.administrator.update' => 'Thelia\\Form\\AdministratorModificationForm', 'thelia.admin.mailing-system.update' => 'Thelia\\Form\\MailingSystemModificationForm', 'thelia.admin.template.creation' => 'Thelia\\Form\\TemplateCreationForm', 'thelia.admin.template.modification' => 'Thelia\\Form\\TemplateModificationForm', 'thelia.admin.country.creation' => 'Thelia\\Form\\CountryCreationForm', 'thelia.admin.country.modification' => 'Thelia\\Form\\CountryModificationForm', 'thelia.admin.area.create' => 'Thelia\\Form\\Area\\AreaCreateForm', 'thelia.admin.area.modification' => 'Thelia\\Form\\Area\\AreaModificationForm', 'thelia.admin.area.country' => 'Thelia\\Form\\Area\\AreaCountryForm', 'thelia.admin.area.delete.country' => 'Thelia\\Form\\Area\\AreaDeleteCountryForm', 'thelia.admin.area.postage' => 'Thelia\\Form\\Area\\AreaPostageForm', 'thelia.shopping_zone_area' => 'Thelia\\Form\\ShippingZone\\ShippingZoneAddArea', 'thelia.shipping_zone_area' => 'Thelia\\Form\\ShippingZone\\ShippingZoneAddArea', 'thelia.shopping_zone_remove_area' => 'Thelia\\Form\\ShippingZone\\ShippingZoneRemoveArea', 'thelia.lang.update' => 'Thelia\\Form\\Lang\\LangUpdateForm', 'thelia.lang.create' => 'Thelia\\Form\\Lang\\LangCreateForm', 'thelia.lang.defaultBehavior' => 'Thelia\\Form\\Lang\\LangDefaultBehaviorForm', 'thelia.lang.url' => 'Thelia\\Form\\Lang\\LangUrlForm', 'thelia.configuration.store' => 'Thelia\\Form\\ConfigStoreForm', 'thelia.system-logs.configuration' => 'Thelia\\Form\\SystemLogConfigurationForm', 'thelia.admin.module.modification' => 'Thelia\\Form\\ModuleModificationForm', 'thelia.admin.module.image.modification' => 'Thelia\\Form\\ModuleImageModification', 'thelia.admin.module.install' => 'Thelia\\Form\\ModuleInstallForm', 'thelia.admin.hook.creation' => 'Thelia\\Form\\HookCreationForm', 'thelia.admin.hook.modification' => 'Thelia\\Form\\HookModificationForm', 'thelia.admin.module-hook.creation' => 'Thelia\\Form\\ModuleHookCreationForm', 'thelia.admin.module-hook.modification' => 'Thelia\\Form\\ModuleHookModificationForm', 'thelia.cache.flush' => 'Thelia\\Form\\Cache\\CacheFlushForm', 'thelia.assets.flush' => 'Thelia\\Form\\Cache\\AssetsFlushForm', 'thelia.images-and-documents-cache.flush' => 'Thelia\\Form\\Cache\\ImagesAndDocumentsCacheFlushForm', 'thelia.export' => 'Thelia\\Form\\ExportForm', 'thelia.import' => 'Thelia\\Form\\ImportForm', 'thelia.admin.sale.creation' => 'Thelia\\Form\\Sale\\SaleCreationForm', 'thelia.admin.sale.modification' => 'Thelia\\Form\\Sale\\SaleModificationForm', 'thelia.empty' => 'Thelia\\Form\\EmptyForm', 'thelia_api_create' => 'Thelia\\Form\\Api\\ApiCreateForm', 'thelia_api_update' => 'Thelia\\Form\\Api\\ApiUpdateForm', 'carousel.image' => 'Carousel\\Form\\CarouselImageForm', 'carousel.update' => 'Carousel\\Form\\CarouselUpdateForm', 'hookanalytics.configuration.form' => 'HookAnalytics\\Form\\Configuration', 'hooknavigation.configuration' => 'HookNavigation\\Form\\HookNavigationConfigForm', 'hooksocial.configuration.form' => 'HookSocial\\Form\\Configuration', 'konfigurator.heizlast.berechnung' => 'HookKonfigurator\\Form\\HeizlastBerechnung'));

        return $instance;
    }

    /**
     * Gets the 'smarty.plugin.adminutilities' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \TheliaSmarty\Template\Plugins\AdminUtilities A TheliaSmarty\Template\Plugins\AdminUtilities instance.
     * 
     * @throws InactiveScopeException when the 'smarty.plugin.adminutilities' service is requested while the 'request' scope is not active
     */
    protected function getSmarty_Plugin_AdminutilitiesService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('smarty.plugin.adminutilities', 'request');
        }

        return $this->services['smarty.plugin.adminutilities'] = $this->scopedServices['request']['smarty.plugin.adminutilities'] = new \TheliaSmarty\Template\Plugins\AdminUtilities($this->get('thelia.securitycontext'), $this->get('thelia.template_helper'));
    }

    /**
     * Gets the 'smarty.plugin.assets' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \TheliaSmarty\Template\Plugins\Assets A TheliaSmarty\Template\Plugins\Assets instance.
     */
    protected function getSmarty_Plugin_AssetsService()
    {
        return $this->services['smarty.plugin.assets'] = new \TheliaSmarty\Template\Plugins\Assets($this->get('assetic.asset.manager'), $this->get('thelia.parser.asset.resolver'));
    }

    /**
     * Gets the 'smarty.plugin.cartpostage' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \TheliaSmarty\Template\Plugins\CartPostage A TheliaSmarty\Template\Plugins\CartPostage instance.
     * 
     * @throws InactiveScopeException when the 'smarty.plugin.cartpostage' service is requested while the 'request' scope is not active
     */
    protected function getSmarty_Plugin_CartpostageService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('smarty.plugin.cartpostage', 'request');
        }

        return $this->services['smarty.plugin.cartpostage'] = $this->scopedServices['request']['smarty.plugin.cartpostage'] = new \TheliaSmarty\Template\Plugins\CartPostage($this);
    }

    /**
     * Gets the 'smarty.plugin.dataaccess' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \TheliaSmarty\Template\Plugins\DataAccessFunctions A TheliaSmarty\Template\Plugins\DataAccessFunctions instance.
     * 
     * @throws InactiveScopeException when the 'smarty.plugin.dataaccess' service is requested while the 'request' scope is not active
     */
    protected function getSmarty_Plugin_DataaccessService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('smarty.plugin.dataaccess', 'request');
        }

        return $this->services['smarty.plugin.dataaccess'] = $this->scopedServices['request']['smarty.plugin.dataaccess'] = new \TheliaSmarty\Template\Plugins\DataAccessFunctions($this->get('request'), $this->get('thelia.securitycontext'), $this->get('thelia.taxengine'), $this->get('thelia.parser.context'), $this->get('event_dispatcher'));
    }

    /**
     * Gets the 'smarty.plugin.esi' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \TheliaSmarty\Template\Plugins\Esi A TheliaSmarty\Template\Plugins\Esi instance.
     * 
     * @throws InactiveScopeException when the 'smarty.plugin.esi' service is requested while the 'request' scope is not active
     */
    protected function getSmarty_Plugin_EsiService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('smarty.plugin.esi', 'request');
        }

        return $this->services['smarty.plugin.esi'] = $this->scopedServices['request']['smarty.plugin.esi'] = new \TheliaSmarty\Template\Plugins\Esi($this->get('fragment.renderer.esi'), $this->get('request'));
    }

    /**
     * Gets the 'smarty.plugin.flashmessage' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \TheliaSmarty\Template\Plugins\FlashMessage A TheliaSmarty\Template\Plugins\FlashMessage instance.
     * 
     * @throws InactiveScopeException when the 'smarty.plugin.flashmessage' service is requested while the 'request' scope is not active
     */
    protected function getSmarty_Plugin_FlashmessageService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('smarty.plugin.flashmessage', 'request');
        }

        return $this->services['smarty.plugin.flashmessage'] = $this->scopedServices['request']['smarty.plugin.flashmessage'] = new \TheliaSmarty\Template\Plugins\FlashMessage($this->get('request'), $this->get('thelia.translator'));
    }

    /**
     * Gets the 'smarty.plugin.format' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \TheliaSmarty\Template\Plugins\Format A TheliaSmarty\Template\Plugins\Format instance.
     * 
     * @throws InactiveScopeException when the 'smarty.plugin.format' service is requested while the 'request' scope is not active
     */
    protected function getSmarty_Plugin_FormatService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('smarty.plugin.format', 'request');
        }

        return $this->services['smarty.plugin.format'] = $this->scopedServices['request']['smarty.plugin.format'] = new \TheliaSmarty\Template\Plugins\Format($this->get('request'));
    }

    /**
     * Gets the 'smarty.plugin.hook' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \TheliaSmarty\Template\Plugins\Hook A TheliaSmarty\Template\Plugins\Hook instance.
     * 
     * @throws InactiveScopeException when the 'smarty.plugin.hook' service is requested while the 'request' scope is not active
     */
    protected function getSmarty_Plugin_HookService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('smarty.plugin.hook', 'request');
        }

        return $this->services['smarty.plugin.hook'] = $this->scopedServices['request']['smarty.plugin.hook'] = new \TheliaSmarty\Template\Plugins\Hook(true, $this->get('event_dispatcher'));
    }

    /**
     * Gets the 'smarty.plugin.module' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \TheliaSmarty\Template\Plugins\Module A TheliaSmarty\Template\Plugins\Module instance.
     * 
     * @throws InactiveScopeException when the 'smarty.plugin.module' service is requested while the 'request' scope is not active
     */
    protected function getSmarty_Plugin_ModuleService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('smarty.plugin.module', 'request');
        }

        return $this->services['smarty.plugin.module'] = $this->scopedServices['request']['smarty.plugin.module'] = new \TheliaSmarty\Template\Plugins\Module(true, $this->get('request'));
    }

    /**
     * Gets the 'smarty.plugin.render' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \TheliaSmarty\Template\Plugins\Render A TheliaSmarty\Template\Plugins\Render instance.
     * 
     * @throws InactiveScopeException when the 'smarty.plugin.render' service is requested while the 'request' scope is not active
     */
    protected function getSmarty_Plugin_RenderService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('smarty.plugin.render', 'request');
        }

        return $this->services['smarty.plugin.render'] = $this->scopedServices['request']['smarty.plugin.render'] = new \TheliaSmarty\Template\Plugins\Render($this->get('controller_resolver'), $this->get('request'), $this);
    }

    /**
     * Gets the 'smarty.plugin.security' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \TheliaSmarty\Template\Plugins\Security A TheliaSmarty\Template\Plugins\Security instance.
     * 
     * @throws InactiveScopeException when the 'smarty.plugin.security' service is requested while the 'request' scope is not active
     */
    protected function getSmarty_Plugin_SecurityService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('smarty.plugin.security', 'request');
        }

        return $this->services['smarty.plugin.security'] = $this->scopedServices['request']['smarty.plugin.security'] = new \TheliaSmarty\Template\Plugins\Security($this->get('request'), $this->get('event_dispatcher'), $this->get('thelia.securitycontext'));
    }

    /**
     * Gets the 'smarty.plugin.thelialoop' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \TheliaSmarty\Template\Plugins\TheliaLoop A TheliaSmarty\Template\Plugins\TheliaLoop instance.
     * 
     * @throws InactiveScopeException when the 'smarty.plugin.thelialoop' service is requested while the 'request' scope is not active
     */
    protected function getSmarty_Plugin_ThelialoopService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('smarty.plugin.thelialoop', 'request');
        }

        $this->services['smarty.plugin.thelialoop'] = $this->scopedServices['request']['smarty.plugin.thelialoop'] = $instance = new \TheliaSmarty\Template\Plugins\TheliaLoop($this);

        $instance->setLoopList(array('accessory' => 'Thelia\\Core\\Template\\Loop\\Accessory', 'address' => 'Thelia\\Core\\Template\\Loop\\Address', 'admin' => 'Thelia\\Core\\Template\\Loop\\Admin', 'area' => 'Thelia\\Core\\Template\\Loop\\Area', 'associated_content' => 'Thelia\\Core\\Template\\Loop\\AssociatedContent', 'attribute' => 'Thelia\\Core\\Template\\Loop\\Attribute', 'attribute_availability' => 'Thelia\\Core\\Template\\Loop\\AttributeAvailability', 'attribute_combination' => 'Thelia\\Core\\Template\\Loop\\AttributeCombination', 'auth' => 'Thelia\\Core\\Template\\Loop\\Auth', 'brand' => 'Thelia\\Core\\Template\\Loop\\Brand', 'category' => 'Thelia\\Core\\Template\\Loop\\Category', 'content' => 'Thelia\\Core\\Template\\Loop\\Content', 'country' => 'Thelia\\Core\\Template\\Loop\\Country', 'currency' => 'Thelia\\Core\\Template\\Loop\\Currency', 'customer' => 'Thelia\\Core\\Template\\Loop\\Customer', 'feature' => 'Thelia\\Core\\Template\\Loop\\Feature', 'feature-availability' => 'Thelia\\Core\\Template\\Loop\\FeatureAvailability', 'feature_value' => 'Thelia\\Core\\Template\\Loop\\FeatureValue', 'folder' => 'Thelia\\Core\\Template\\Loop\\Folder', 'folder-path' => 'Thelia\\Core\\Template\\Loop\\FolderPath', 'module' => 'Thelia\\Core\\Template\\Loop\\Module', 'hook' => 'Thelia\\Core\\Template\\Loop\\Hook', 'module_hook' => 'Thelia\\Core\\Template\\Loop\\ModuleHook', 'order' => 'Thelia\\Core\\Template\\Loop\\Order', 'order_address' => 'Thelia\\Core\\Template\\Loop\\OrderAddress', 'order_product' => 'Thelia\\Core\\Template\\Loop\\OrderProduct', 'order_product_tax' => 'Thelia\\Core\\Template\\Loop\\OrderProductTax', 'order_coupon' => 'Thelia\\Core\\Template\\Loop\\OrderCoupon', 'order_product_attribute_combination' => 'Thelia\\Core\\Template\\Loop\\OrderProductAttributeCombination', 'order-status' => 'Thelia\\Core\\Template\\Loop\\OrderStatus', 'category-path' => 'Thelia\\Core\\Template\\Loop\\CategoryPath', 'payment' => 'Thelia\\Core\\Template\\Loop\\Payment', 'product' => 'Thelia\\Core\\Template\\Loop\\Product', 'product_sale_elements' => 'Thelia\\Core\\Template\\Loop\\ProductSaleElements', 'profile' => 'Thelia\\Core\\Template\\Loop\\Profile', 'resource' => 'Thelia\\Core\\Template\\Loop\\Resource', 'feed' => 'Thelia\\Core\\Template\\Loop\\Feed', 'title' => 'Thelia\\Core\\Template\\Loop\\Title', 'lang' => 'Thelia\\Core\\Template\\Loop\\Lang', 'category-tree' => 'Thelia\\Core\\Template\\Loop\\CategoryTree', 'folder-tree' => 'Thelia\\Core\\Template\\Loop\\FolderTree', 'cart' => 'Thelia\\Core\\Template\\Loop\\Cart', 'image' => 'Thelia\\Core\\Template\\Loop\\Image', 'document' => 'Thelia\\Core\\Template\\Loop\\Document', 'config' => 'Thelia\\Core\\Template\\Loop\\Config', 'coupon' => 'Thelia\\Core\\Template\\Loop\\Coupon', 'message' => 'Thelia\\Core\\Template\\Loop\\Message', 'delivery' => 'Thelia\\Core\\Template\\Loop\\Delivery', 'product-template' => 'Thelia\\Core\\Template\\Loop\\ProductTemplate', 'template' => 'Thelia\\Core\\Template\\Loop\\Template', 'tax' => 'Thelia\\Core\\Template\\Loop\\Tax', 'tax-rule' => 'Thelia\\Core\\Template\\Loop\\TaxRule', 'tax-rule-country' => 'Thelia\\Core\\Template\\Loop\\TaxRuleCountry', 'formatter' => 'Thelia\\Core\\Template\\Loop\\Formatter', 'archive-builder' => 'Thelia\\Core\\Template\\Loop\\ArchiveBuilder', 'import-category' => 'Thelia\\Core\\Template\\Loop\\ImportCategory', 'export-category' => 'Thelia\\Core\\Template\\Loop\\ExportCategory', 'import' => 'Thelia\\Core\\Template\\Loop\\Import', 'export' => 'Thelia\\Core\\Template\\Loop\\Export', 'sale' => 'Thelia\\Core\\Template\\Loop\\Sale', 'module-config' => 'Thelia\\Core\\Template\\Loop\\ModuleConfig', 'product-sale-elements-document' => 'Thelia\\Core\\Template\\Loop\\ProductSaleElementsDocument', 'product-sale-elements-image' => 'Thelia\\Core\\Template\\Loop\\ProductSaleElementsImage', 'carousel' => 'Carousel\\Loop\\CarouselLoop', 'product_heizung' => 'HookKonfigurator\\Loop\\ProductHeizung'));

        return $instance;
    }

    /**
     * Gets the 'smarty.plugin.translation' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \TheliaSmarty\Template\Plugins\Translation A TheliaSmarty\Template\Plugins\Translation instance.
     */
    protected function getSmarty_Plugin_TranslationService()
    {
        return $this->services['smarty.plugin.translation'] = new \TheliaSmarty\Template\Plugins\Translation($this->get('thelia.translator'));
    }

    /**
     * Gets the 'smarty.plugin.type' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \TheliaSmarty\Template\Plugins\Type A TheliaSmarty\Template\Plugins\Type instance.
     * 
     * @throws InactiveScopeException when the 'smarty.plugin.type' service is requested while the 'request' scope is not active
     */
    protected function getSmarty_Plugin_TypeService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('smarty.plugin.type', 'request');
        }

        return $this->services['smarty.plugin.type'] = $this->scopedServices['request']['smarty.plugin.type'] = new \TheliaSmarty\Template\Plugins\Type();
    }

    /**
     * Gets the 'smarty.url.module' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \TheliaSmarty\Template\Plugins\UrlGenerator A TheliaSmarty\Template\Plugins\UrlGenerator instance.
     * 
     * @throws InactiveScopeException when the 'smarty.url.module' service is requested while the 'request' scope is not active
     */
    protected function getSmarty_Url_ModuleService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('smarty.url.module', 'request');
        }

        return $this->services['smarty.url.module'] = $this->scopedServices['request']['smarty.url.module'] = new \TheliaSmarty\Template\Plugins\UrlGenerator($this->get('request'), $this->get('thelia.token_provider'));
    }

    /**
     * Gets the 'stack_factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Stack\Builder A Stack\Builder instance.
     */
    protected function getStackFactoryService()
    {
        $a = $this->get('event_dispatcher');

        $this->services['stack_factory'] = $instance = new \Stack\Builder();

        $instance->push('Thelia\\Core\\Stack\\SessionMiddleware', $a, __DIR__, true, 'dev');
        $instance->push('Thelia\\Core\\Stack\\ParamInitMiddleware', $this->get('thelia.url.manager'), $this->get('thelia.translator'), $a);

        return $instance;
    }

    /**
     * Gets the 'test.client' service.
     *
     * @return \Thelia\Core\HttpKernel\Client A Thelia\Core\HttpKernel\Client instance.
     */
    protected function getTest_ClientService()
    {
        return new \Thelia\Core\HttpKernel\Client($this->get('kernel'), array(), new \Symfony\Component\BrowserKit\History(), new \Symfony\Component\BrowserKit\CookieJar());
    }

    /**
     * Gets the 'test.client.cookiejar' service.
     *
     * @return \Symfony\Component\BrowserKit\CookieJar A Symfony\Component\BrowserKit\CookieJar instance.
     */
    protected function getTest_Client_CookiejarService()
    {
        return new \Symfony\Component\BrowserKit\CookieJar();
    }

    /**
     * Gets the 'test.client.history' service.
     *
     * @return \Symfony\Component\BrowserKit\History A Symfony\Component\BrowserKit\History instance.
     */
    protected function getTest_Client_HistoryService()
    {
        return new \Symfony\Component\BrowserKit\History();
    }

    /**
     * Gets the 'thelia.action.address' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\Address A Thelia\Action\Address instance.
     */
    protected function getThelia_Action_AddressService()
    {
        return $this->services['thelia.action.address'] = new \Thelia\Action\Address();
    }

    /**
     * Gets the 'thelia.action.administrator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\Administrator A Thelia\Action\Administrator instance.
     */
    protected function getThelia_Action_AdministratorService()
    {
        return $this->services['thelia.action.administrator'] = new \Thelia\Action\Administrator();
    }

    /**
     * Gets the 'thelia.action.api' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\Api A Thelia\Action\Api instance.
     */
    protected function getThelia_Action_ApiService()
    {
        return $this->services['thelia.action.api'] = new \Thelia\Action\Api();
    }

    /**
     * Gets the 'thelia.action.area' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\Area A Thelia\Action\Area instance.
     */
    protected function getThelia_Action_AreaService()
    {
        return $this->services['thelia.action.area'] = new \Thelia\Action\Area();
    }

    /**
     * Gets the 'thelia.action.attribute' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\Attribute A Thelia\Action\Attribute instance.
     */
    protected function getThelia_Action_AttributeService()
    {
        return $this->services['thelia.action.attribute'] = new \Thelia\Action\Attribute();
    }

    /**
     * Gets the 'thelia.action.attributeav' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\AttributeAv A Thelia\Action\AttributeAv instance.
     */
    protected function getThelia_Action_AttributeavService()
    {
        return $this->services['thelia.action.attributeav'] = new \Thelia\Action\AttributeAv();
    }

    /**
     * Gets the 'thelia.action.brand' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\Brand A Thelia\Action\Brand instance.
     */
    protected function getThelia_Action_BrandService()
    {
        return $this->services['thelia.action.brand'] = new \Thelia\Action\Brand();
    }

    /**
     * Gets the 'thelia.action.cache' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\Cache A Thelia\Action\Cache instance.
     */
    protected function getThelia_Action_CacheService()
    {
        return $this->services['thelia.action.cache'] = new \Thelia\Action\Cache();
    }

    /**
     * Gets the 'thelia.action.cart' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\Cart A Thelia\Action\Cart instance.
     * 
     * @throws InactiveScopeException when the 'thelia.action.cart' service is requested while the 'request' scope is not active
     */
    protected function getThelia_Action_CartService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('thelia.action.cart', 'request');
        }

        return $this->services['thelia.action.cart'] = $this->scopedServices['request']['thelia.action.cart'] = new \Thelia\Action\Cart($this->get('request'), $this->get('thelia.token_provider'));
    }

    /**
     * Gets the 'thelia.action.category' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\Category A Thelia\Action\Category instance.
     */
    protected function getThelia_Action_CategoryService()
    {
        return $this->services['thelia.action.category'] = new \Thelia\Action\Category();
    }

    /**
     * Gets the 'thelia.action.config' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\Config A Thelia\Action\Config instance.
     */
    protected function getThelia_Action_ConfigService()
    {
        return $this->services['thelia.action.config'] = new \Thelia\Action\Config();
    }

    /**
     * Gets the 'thelia.action.content' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\Content A Thelia\Action\Content instance.
     */
    protected function getThelia_Action_ContentService()
    {
        return $this->services['thelia.action.content'] = new \Thelia\Action\Content();
    }

    /**
     * Gets the 'thelia.action.country' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\Country A Thelia\Action\Country instance.
     */
    protected function getThelia_Action_CountryService()
    {
        return $this->services['thelia.action.country'] = new \Thelia\Action\Country();
    }

    /**
     * Gets the 'thelia.action.coupon' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\Coupon A Thelia\Action\Coupon instance.
     * 
     * @throws InactiveScopeException when the 'thelia.action.coupon' service is requested while the 'request' scope is not active
     */
    protected function getThelia_Action_CouponService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('thelia.action.coupon', 'request');
        }

        return $this->services['thelia.action.coupon'] = $this->scopedServices['request']['thelia.action.coupon'] = new \Thelia\Action\Coupon($this->get('request'), $this->get('thelia.coupon.factory'), $this->get('thelia.coupon.manager'), $this->get('thelia.condition.match_for_everyone'), $this->get('thelia.condition.factory'));
    }

    /**
     * Gets the 'thelia.action.currency' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\Currency A Thelia\Action\Currency instance.
     */
    protected function getThelia_Action_CurrencyService()
    {
        return $this->services['thelia.action.currency'] = new \Thelia\Action\Currency($this->get('currency.converter'));
    }

    /**
     * Gets the 'thelia.action.customer' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\Customer A Thelia\Action\Customer instance.
     * 
     * @throws InactiveScopeException when the 'thelia.action.customer' service is requested while the 'request' scope is not active
     */
    protected function getThelia_Action_CustomerService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('thelia.action.customer', 'request');
        }

        return $this->services['thelia.action.customer'] = $this->scopedServices['request']['thelia.action.customer'] = new \Thelia\Action\Customer($this->get('thelia.securitycontext'), $this->get('mailer'));
    }

    /**
     * Gets the 'thelia.action.customer_title' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\CustomerTitle A Thelia\Action\CustomerTitle instance.
     */
    protected function getThelia_Action_CustomerTitleService()
    {
        return $this->services['thelia.action.customer_title'] = new \Thelia\Action\CustomerTitle();
    }

    /**
     * Gets the 'thelia.action.document' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\Document A Thelia\Action\Document instance.
     */
    protected function getThelia_Action_DocumentService()
    {
        return $this->services['thelia.action.document'] = new \Thelia\Action\Document($this->get('thelia.file_manager'));
    }

    /**
     * Gets the 'thelia.action.feature' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\Feature A Thelia\Action\Feature instance.
     */
    protected function getThelia_Action_FeatureService()
    {
        return $this->services['thelia.action.feature'] = new \Thelia\Action\Feature();
    }

    /**
     * Gets the 'thelia.action.featureav' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\FeatureAv A Thelia\Action\FeatureAv instance.
     */
    protected function getThelia_Action_FeatureavService()
    {
        return $this->services['thelia.action.featureav'] = new \Thelia\Action\FeatureAv();
    }

    /**
     * Gets the 'thelia.action.file' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\File A Thelia\Action\File instance.
     */
    protected function getThelia_Action_FileService()
    {
        return $this->services['thelia.action.file'] = new \Thelia\Action\File();
    }

    /**
     * Gets the 'thelia.action.folder' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\Folder A Thelia\Action\Folder instance.
     */
    protected function getThelia_Action_FolderService()
    {
        return $this->services['thelia.action.folder'] = new \Thelia\Action\Folder();
    }

    /**
     * Gets the 'thelia.action.hook' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\Hook A Thelia\Action\Hook instance.
     */
    protected function getThelia_Action_HookService()
    {
        return $this->services['thelia.action.hook'] = new \Thelia\Action\Hook(__DIR__);
    }

    /**
     * Gets the 'thelia.action.httpexception' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\HttpException A Thelia\Action\HttpException instance.
     * 
     * @throws InactiveScopeException when the 'thelia.action.httpexception' service is requested while the 'request' scope is not active
     */
    protected function getThelia_Action_HttpexceptionService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('thelia.action.httpexception', 'request');
        }

        return $this->services['thelia.action.httpexception'] = $this->scopedServices['request']['thelia.action.httpexception'] = new \Thelia\Action\HttpException($this->get('thelia.parser'));
    }

    /**
     * Gets the 'thelia.action.image' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\Image A Thelia\Action\Image instance.
     */
    protected function getThelia_Action_ImageService()
    {
        return $this->services['thelia.action.image'] = new \Thelia\Action\Image($this->get('thelia.file_manager'));
    }

    /**
     * Gets the 'thelia.action.lang' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\Lang A Thelia\Action\Lang instance.
     * 
     * @throws InactiveScopeException when the 'thelia.action.lang' service is requested while the 'request' scope is not active
     */
    protected function getThelia_Action_LangService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('thelia.action.lang', 'request');
        }

        return $this->services['thelia.action.lang'] = $this->scopedServices['request']['thelia.action.lang'] = new \Thelia\Action\Lang($this->get('thelia.template_helper'), $this->get('request'));
    }

    /**
     * Gets the 'thelia.action.mailing_system' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\MailingSystem A Thelia\Action\MailingSystem instance.
     */
    protected function getThelia_Action_MailingSystemService()
    {
        return $this->services['thelia.action.mailing_system'] = new \Thelia\Action\MailingSystem();
    }

    /**
     * Gets the 'thelia.action.message' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\Message A Thelia\Action\Message instance.
     */
    protected function getThelia_Action_MessageService()
    {
        return $this->services['thelia.action.message'] = new \Thelia\Action\Message();
    }

    /**
     * Gets the 'thelia.action.module' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\Module A Thelia\Action\Module instance.
     */
    protected function getThelia_Action_ModuleService()
    {
        return $this->services['thelia.action.module'] = new \Thelia\Action\Module($this);
    }

    /**
     * Gets the 'thelia.action.modulehook' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\ModuleHook A Thelia\Action\ModuleHook instance.
     */
    protected function getThelia_Action_ModulehookService()
    {
        return $this->services['thelia.action.modulehook'] = new \Thelia\Action\ModuleHook(__DIR__);
    }

    /**
     * Gets the 'thelia.action.newsletter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\Newsletter A Thelia\Action\Newsletter instance.
     */
    protected function getThelia_Action_NewsletterService()
    {
        return $this->services['thelia.action.newsletter'] = new \Thelia\Action\Newsletter();
    }

    /**
     * Gets the 'thelia.action.order' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\Order A Thelia\Action\Order instance.
     * 
     * @throws InactiveScopeException when the 'thelia.action.order' service is requested while the 'request' scope is not active
     */
    protected function getThelia_Action_OrderService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('thelia.action.order', 'request');
        }

        return $this->services['thelia.action.order'] = $this->scopedServices['request']['thelia.action.order'] = new \Thelia\Action\Order($this->get('request'), $this->get('mailer'), $this->get('thelia.securitycontext'));
    }

    /**
     * Gets the 'thelia.action.pdf' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\Pdf A Thelia\Action\Pdf instance.
     */
    protected function getThelia_Action_PdfService()
    {
        return $this->services['thelia.action.pdf'] = new \Thelia\Action\Pdf();
    }

    /**
     * Gets the 'thelia.action.product' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\Product A Thelia\Action\Product instance.
     */
    protected function getThelia_Action_ProductService()
    {
        return $this->services['thelia.action.product'] = new \Thelia\Action\Product();
    }

    /**
     * Gets the 'thelia.action.product_sale_element' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\ProductSaleElement A Thelia\Action\ProductSaleElement instance.
     */
    protected function getThelia_Action_ProductSaleElementService()
    {
        return $this->services['thelia.action.product_sale_element'] = new \Thelia\Action\ProductSaleElement();
    }

    /**
     * Gets the 'thelia.action.profile' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\Profile A Thelia\Action\Profile instance.
     */
    protected function getThelia_Action_ProfileService()
    {
        return $this->services['thelia.action.profile'] = new \Thelia\Action\Profile();
    }

    /**
     * Gets the 'thelia.action.redirectexception' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\RedirectException A Thelia\Action\RedirectException instance.
     */
    protected function getThelia_Action_RedirectexceptionService()
    {
        return $this->services['thelia.action.redirectexception'] = new \Thelia\Action\RedirectException($this->get('thelia.url.manager'));
    }

    /**
     * Gets the 'thelia.action.sale' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\Sale A Thelia\Action\Sale instance.
     */
    protected function getThelia_Action_SaleService()
    {
        return $this->services['thelia.action.sale'] = new \Thelia\Action\Sale();
    }

    /**
     * Gets the 'thelia.action.shippingzone' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\ShippingZone A Thelia\Action\ShippingZone instance.
     */
    protected function getThelia_Action_ShippingzoneService()
    {
        return $this->services['thelia.action.shippingzone'] = new \Thelia\Action\ShippingZone();
    }

    /**
     * Gets the 'thelia.action.tax' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\Tax A Thelia\Action\Tax instance.
     */
    protected function getThelia_Action_TaxService()
    {
        return $this->services['thelia.action.tax'] = new \Thelia\Action\Tax();
    }

    /**
     * Gets the 'thelia.action.taxrule' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\TaxRule A Thelia\Action\TaxRule instance.
     */
    protected function getThelia_Action_TaxruleService()
    {
        return $this->services['thelia.action.taxrule'] = new \Thelia\Action\TaxRule();
    }

    /**
     * Gets the 'thelia.action.template' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\Template A Thelia\Action\Template instance.
     */
    protected function getThelia_Action_TemplateService()
    {
        return $this->services['thelia.action.template'] = new \Thelia\Action\Template();
    }

    /**
     * Gets the 'thelia.action.translation' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\Translation A Thelia\Action\Translation instance.
     */
    protected function getThelia_Action_TranslationService()
    {
        return $this->services['thelia.action.translation'] = new \Thelia\Action\Translation($this);
    }

    /**
     * Gets the 'thelia.admin.base_controller' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Admin\Controller\BaseAdminController A Thelia\Admin\Controller\BaseAdminController instance.
     * 
     * @throws InactiveScopeException when the 'thelia.admin.base_controller' service is requested while the 'request' scope is not active
     */
    protected function getThelia_Admin_BaseControllerService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('thelia.admin.base_controller', 'request');
        }

        return $this->services['thelia.admin.base_controller'] = $this->scopedServices['request']['thelia.admin.base_controller'] = new \Thelia\Admin\Controller\BaseAdminController($this->get('thelia.parser'));
    }

    /**
     * Gets the 'thelia.archive_builder.tar' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\FileFormat\Archive\ArchiveBuilder\TarArchiveBuilder A Thelia\Core\FileFormat\Archive\ArchiveBuilder\TarArchiveBuilder instance.
     */
    protected function getThelia_ArchiveBuilder_TarService()
    {
        return $this->services['thelia.archive_builder.tar'] = new \Thelia\Core\FileFormat\Archive\ArchiveBuilder\TarArchiveBuilder();
    }

    /**
     * Gets the 'thelia.archive_builder.tar_bz2' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\FileFormat\Archive\ArchiveBuilder\TarBz2ArchiveBuilder A Thelia\Core\FileFormat\Archive\ArchiveBuilder\TarBz2ArchiveBuilder instance.
     */
    protected function getThelia_ArchiveBuilder_TarBz2Service()
    {
        return $this->services['thelia.archive_builder.tar_bz2'] = new \Thelia\Core\FileFormat\Archive\ArchiveBuilder\TarBz2ArchiveBuilder();
    }

    /**
     * Gets the 'thelia.archive_builder.tar_gz' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\FileFormat\Archive\ArchiveBuilder\TarGzArchiveBuilder A Thelia\Core\FileFormat\Archive\ArchiveBuilder\TarGzArchiveBuilder instance.
     */
    protected function getThelia_ArchiveBuilder_TarGzService()
    {
        return $this->services['thelia.archive_builder.tar_gz'] = new \Thelia\Core\FileFormat\Archive\ArchiveBuilder\TarGzArchiveBuilder();
    }

    /**
     * Gets the 'thelia.archive_builder.zip' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\FileFormat\Archive\ArchiveBuilder\ZipArchiveBuilder A Thelia\Core\FileFormat\Archive\ArchiveBuilder\ZipArchiveBuilder instance.
     */
    protected function getThelia_ArchiveBuilder_ZipService()
    {
        return $this->services['thelia.archive_builder.zip'] = new \Thelia\Core\FileFormat\Archive\ArchiveBuilder\ZipArchiveBuilder();
    }

    /**
     * Gets the 'thelia.condition.cart_contains_categories' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Condition\Implementation\CartContainsCategories A Thelia\Condition\Implementation\CartContainsCategories instance.
     */
    protected function getThelia_Condition_CartContainsCategoriesService()
    {
        return $this->services['thelia.condition.cart_contains_categories'] = new \Thelia\Condition\Implementation\CartContainsCategories($this->get('thelia.facade'));
    }

    /**
     * Gets the 'thelia.condition.cart_contains_products' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Condition\Implementation\CartContainsProducts A Thelia\Condition\Implementation\CartContainsProducts instance.
     */
    protected function getThelia_Condition_CartContainsProductsService()
    {
        return $this->services['thelia.condition.cart_contains_products'] = new \Thelia\Condition\Implementation\CartContainsProducts($this->get('thelia.facade'));
    }

    /**
     * Gets the 'thelia.condition.factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Condition\ConditionFactory A Thelia\Condition\ConditionFactory instance.
     */
    protected function getThelia_Condition_FactoryService()
    {
        return $this->services['thelia.condition.factory'] = new \Thelia\Condition\ConditionFactory($this);
    }

    /**
     * Gets the 'thelia.condition.for_some_customers' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Condition\Implementation\ForSomeCustomers A Thelia\Condition\Implementation\ForSomeCustomers instance.
     */
    protected function getThelia_Condition_ForSomeCustomersService()
    {
        return $this->services['thelia.condition.for_some_customers'] = new \Thelia\Condition\Implementation\ForSomeCustomers($this->get('thelia.facade'));
    }

    /**
     * Gets the 'thelia.condition.match_billing_countries' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Condition\Implementation\MatchBillingCountries A Thelia\Condition\Implementation\MatchBillingCountries instance.
     */
    protected function getThelia_Condition_MatchBillingCountriesService()
    {
        return $this->services['thelia.condition.match_billing_countries'] = new \Thelia\Condition\Implementation\MatchBillingCountries($this->get('thelia.facade'));
    }

    /**
     * Gets the 'thelia.condition.match_delivery_countries' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Condition\Implementation\MatchDeliveryCountries A Thelia\Condition\Implementation\MatchDeliveryCountries instance.
     */
    protected function getThelia_Condition_MatchDeliveryCountriesService()
    {
        return $this->services['thelia.condition.match_delivery_countries'] = new \Thelia\Condition\Implementation\MatchDeliveryCountries($this->get('thelia.facade'));
    }

    /**
     * Gets the 'thelia.condition.match_for_everyone' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Condition\Implementation\MatchForEveryone A Thelia\Condition\Implementation\MatchForEveryone instance.
     */
    protected function getThelia_Condition_MatchForEveryoneService()
    {
        return $this->services['thelia.condition.match_for_everyone'] = new \Thelia\Condition\Implementation\MatchForEveryone($this->get('thelia.facade'));
    }

    /**
     * Gets the 'thelia.condition.match_for_total_amount' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Condition\Implementation\MatchForTotalAmount A Thelia\Condition\Implementation\MatchForTotalAmount instance.
     */
    protected function getThelia_Condition_MatchForTotalAmountService()
    {
        return $this->services['thelia.condition.match_for_total_amount'] = new \Thelia\Condition\Implementation\MatchForTotalAmount($this->get('thelia.facade'));
    }

    /**
     * Gets the 'thelia.condition.match_for_x_articles' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Condition\Implementation\MatchForXArticles A Thelia\Condition\Implementation\MatchForXArticles instance.
     */
    protected function getThelia_Condition_MatchForXArticlesService()
    {
        return $this->services['thelia.condition.match_for_x_articles'] = new \Thelia\Condition\Implementation\MatchForXArticles($this->get('thelia.facade'));
    }

    /**
     * Gets the 'thelia.condition.start_date' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Condition\Implementation\StartDate A Thelia\Condition\Implementation\StartDate instance.
     */
    protected function getThelia_Condition_StartDateService()
    {
        return $this->services['thelia.condition.start_date'] = new \Thelia\Condition\Implementation\StartDate($this->get('thelia.facade'));
    }

    /**
     * Gets the 'thelia.condition.validator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Condition\ConditionEvaluator A Thelia\Condition\ConditionEvaluator instance.
     */
    protected function getThelia_Condition_ValidatorService()
    {
        return $this->services['thelia.condition.validator'] = new \Thelia\Condition\ConditionEvaluator();
    }

    /**
     * Gets the 'thelia.coupon.factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Coupon\CouponFactory A Thelia\Coupon\CouponFactory instance.
     */
    protected function getThelia_Coupon_FactoryService()
    {
        return $this->services['thelia.coupon.factory'] = new \Thelia\Coupon\CouponFactory($this);
    }

    /**
     * Gets the 'thelia.coupon.manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Coupon\CouponManager A Thelia\Coupon\CouponManager instance.
     */
    protected function getThelia_Coupon_ManagerService()
    {
        $this->services['thelia.coupon.manager'] = $instance = new \Thelia\Coupon\CouponManager($this);

        $instance->addAvailableCoupon($this->get('thelia.coupon.type.remove_x_amount'));
        $instance->addAvailableCoupon($this->get('thelia.coupon.type.remove_x_percent'));
        $instance->addAvailableCoupon($this->get('thelia.coupon.type.remove_amount_on_categories'));
        $instance->addAvailableCoupon($this->get('thelia.coupon.type.remove_percentage_on_categories'));
        $instance->addAvailableCoupon($this->get('thelia.coupon.type.remove_amount_on_products'));
        $instance->addAvailableCoupon($this->get('thelia.coupon.type.remove_percentage_on_products'));
        $instance->addAvailableCoupon($this->get('thelia.coupon.type.remove_amount_on_attribute_av'));
        $instance->addAvailableCoupon($this->get('thelia.coupon.type.remove_percentage_on_attribute_av'));
        $instance->addAvailableCoupon($this->get('thelia.coupon.type.free_product'));
        $instance->addAvailableCondition($this->get('thelia.condition.match_for_everyone'));
        $instance->addAvailableCondition($this->get('thelia.condition.match_for_total_amount'));
        $instance->addAvailableCondition($this->get('thelia.condition.match_for_x_articles'));
        $instance->addAvailableCondition($this->get('thelia.condition.match_delivery_countries'));
        $instance->addAvailableCondition($this->get('thelia.condition.match_billing_countries'));
        $instance->addAvailableCondition($this->get('thelia.condition.start_date'));
        $instance->addAvailableCondition($this->get('thelia.condition.cart_contains_categories'));
        $instance->addAvailableCondition($this->get('thelia.condition.cart_contains_products'));
        $instance->addAvailableCondition($this->get('thelia.condition.for_some_customers'));

        return $instance;
    }

    /**
     * Gets the 'thelia.coupon.type.free_product' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Coupon\Type\FreeProduct A Thelia\Coupon\Type\FreeProduct instance.
     */
    protected function getThelia_Coupon_Type_FreeProductService()
    {
        return $this->services['thelia.coupon.type.free_product'] = new \Thelia\Coupon\Type\FreeProduct($this->get('thelia.facade'));
    }

    /**
     * Gets the 'thelia.coupon.type.remove_amount_on_attribute_av' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Coupon\Type\RemoveAmountOnAttributeValues A Thelia\Coupon\Type\RemoveAmountOnAttributeValues instance.
     */
    protected function getThelia_Coupon_Type_RemoveAmountOnAttributeAvService()
    {
        return $this->services['thelia.coupon.type.remove_amount_on_attribute_av'] = new \Thelia\Coupon\Type\RemoveAmountOnAttributeValues($this->get('thelia.facade'));
    }

    /**
     * Gets the 'thelia.coupon.type.remove_amount_on_categories' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Coupon\Type\RemoveAmountOnCategories A Thelia\Coupon\Type\RemoveAmountOnCategories instance.
     */
    protected function getThelia_Coupon_Type_RemoveAmountOnCategoriesService()
    {
        return $this->services['thelia.coupon.type.remove_amount_on_categories'] = new \Thelia\Coupon\Type\RemoveAmountOnCategories($this->get('thelia.facade'));
    }

    /**
     * Gets the 'thelia.coupon.type.remove_amount_on_products' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Coupon\Type\RemoveAmountOnProducts A Thelia\Coupon\Type\RemoveAmountOnProducts instance.
     */
    protected function getThelia_Coupon_Type_RemoveAmountOnProductsService()
    {
        return $this->services['thelia.coupon.type.remove_amount_on_products'] = new \Thelia\Coupon\Type\RemoveAmountOnProducts($this->get('thelia.facade'));
    }

    /**
     * Gets the 'thelia.coupon.type.remove_percentage_on_attribute_av' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Coupon\Type\RemovePercentageOnAttributeValues A Thelia\Coupon\Type\RemovePercentageOnAttributeValues instance.
     */
    protected function getThelia_Coupon_Type_RemovePercentageOnAttributeAvService()
    {
        return $this->services['thelia.coupon.type.remove_percentage_on_attribute_av'] = new \Thelia\Coupon\Type\RemovePercentageOnAttributeValues($this->get('thelia.facade'));
    }

    /**
     * Gets the 'thelia.coupon.type.remove_percentage_on_categories' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Coupon\Type\RemovePercentageOnCategories A Thelia\Coupon\Type\RemovePercentageOnCategories instance.
     */
    protected function getThelia_Coupon_Type_RemovePercentageOnCategoriesService()
    {
        return $this->services['thelia.coupon.type.remove_percentage_on_categories'] = new \Thelia\Coupon\Type\RemovePercentageOnCategories($this->get('thelia.facade'));
    }

    /**
     * Gets the 'thelia.coupon.type.remove_percentage_on_products' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Coupon\Type\RemovePercentageOnProducts A Thelia\Coupon\Type\RemovePercentageOnProducts instance.
     */
    protected function getThelia_Coupon_Type_RemovePercentageOnProductsService()
    {
        return $this->services['thelia.coupon.type.remove_percentage_on_products'] = new \Thelia\Coupon\Type\RemovePercentageOnProducts($this->get('thelia.facade'));
    }

    /**
     * Gets the 'thelia.coupon.type.remove_x_amount' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Coupon\Type\RemoveXAmount A Thelia\Coupon\Type\RemoveXAmount instance.
     */
    protected function getThelia_Coupon_Type_RemoveXAmountService()
    {
        return $this->services['thelia.coupon.type.remove_x_amount'] = new \Thelia\Coupon\Type\RemoveXAmount($this->get('thelia.facade'));
    }

    /**
     * Gets the 'thelia.coupon.type.remove_x_percent' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Coupon\Type\RemoveXPercent A Thelia\Coupon\Type\RemoveXPercent instance.
     */
    protected function getThelia_Coupon_Type_RemoveXPercentService()
    {
        return $this->services['thelia.coupon.type.remove_x_percent'] = new \Thelia\Coupon\Type\RemoveXPercent($this->get('thelia.facade'));
    }

    /**
     * Gets the 'thelia.export.change_position' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\Export A Thelia\Action\Export instance.
     */
    protected function getThelia_Export_ChangePositionService()
    {
        return $this->services['thelia.export.change_position'] = new \Thelia\Action\Export(__DIR__);
    }

    /**
     * Gets the 'thelia.facade' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Coupon\BaseFacade A Thelia\Coupon\BaseFacade instance.
     */
    protected function getThelia_FacadeService()
    {
        return $this->services['thelia.facade'] = new \Thelia\Coupon\BaseFacade($this);
    }

    /**
     * Gets the 'thelia.file_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Files\FileManager A Thelia\Files\FileManager instance.
     */
    protected function getThelia_FileManagerService()
    {
        return $this->services['thelia.file_manager'] = new \Thelia\Files\FileManager(array('document.product' => 'Thelia\\Model\\ProductDocument', 'image.product' => 'Thelia\\Model\\ProductImage', 'document.category' => 'Thelia\\Model\\CategoryDocument', 'image.category' => 'Thelia\\Model\\CategoryImage', 'document.content' => 'Thelia\\Model\\ContentDocument', 'image.content' => 'Thelia\\Model\\ContentImage', 'document.folder' => 'Thelia\\Model\\FolderDocument', 'image.folder' => 'Thelia\\Model\\FolderImage', 'document.brand' => 'Thelia\\Model\\BrandDocument', 'image.brand' => 'Thelia\\Model\\BrandImage', 'image.module' => 'Thelia\\Model\\ModuleImage'));
    }

    /**
     * Gets the 'thelia.form.type.customer_title' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\CustomerTitleType A Thelia\Core\Form\Type\CustomerTitleType instance.
     */
    protected function getThelia_Form_Type_CustomerTitleService()
    {
        return $this->services['thelia.form.type.customer_title'] = new \Thelia\Core\Form\Type\CustomerTitleType($this->get('thelia.form.type.field.customer_title_id'));
    }

    /**
     * Gets the 'thelia.form.type.customer_title_i18n' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\CustomerTitleI18nType A Thelia\Core\Form\Type\CustomerTitleI18nType instance.
     */
    protected function getThelia_Form_Type_CustomerTitleI18nService()
    {
        return $this->services['thelia.form.type.customer_title_i18n'] = new \Thelia\Core\Form\Type\CustomerTitleI18nType();
    }

    /**
     * Gets the 'thelia.form.type.field.accessory_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\AccessoryIdType A Thelia\Core\Form\Type\Field\AccessoryIdType instance.
     */
    protected function getThelia_Form_Type_Field_AccessoryIdService()
    {
        return $this->services['thelia.form.type.field.accessory_id'] = new \Thelia\Core\Form\Type\Field\AccessoryIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.address_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\AddressIdType A Thelia\Core\Form\Type\Field\AddressIdType instance.
     */
    protected function getThelia_Form_Type_Field_AddressIdService()
    {
        return $this->services['thelia.form.type.field.address_id'] = new \Thelia\Core\Form\Type\Field\AddressIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.admin_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\AdminIdType A Thelia\Core\Form\Type\Field\AdminIdType instance.
     */
    protected function getThelia_Form_Type_Field_AdminIdService()
    {
        return $this->services['thelia.form.type.field.admin_id'] = new \Thelia\Core\Form\Type\Field\AdminIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.admin_log_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\AdminLogIdType A Thelia\Core\Form\Type\Field\AdminLogIdType instance.
     */
    protected function getThelia_Form_Type_Field_AdminLogIdService()
    {
        return $this->services['thelia.form.type.field.admin_log_id'] = new \Thelia\Core\Form\Type\Field\AdminLogIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.api_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\ApiIdType A Thelia\Core\Form\Type\Field\ApiIdType instance.
     */
    protected function getThelia_Form_Type_Field_ApiIdService()
    {
        return $this->services['thelia.form.type.field.api_id'] = new \Thelia\Core\Form\Type\Field\ApiIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.area_delivery_module_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\AreaDeliveryModuleIdType A Thelia\Core\Form\Type\Field\AreaDeliveryModuleIdType instance.
     */
    protected function getThelia_Form_Type_Field_AreaDeliveryModuleIdService()
    {
        return $this->services['thelia.form.type.field.area_delivery_module_id'] = new \Thelia\Core\Form\Type\Field\AreaDeliveryModuleIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.area_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\AreaIdType A Thelia\Core\Form\Type\Field\AreaIdType instance.
     */
    protected function getThelia_Form_Type_Field_AreaIdService()
    {
        return $this->services['thelia.form.type.field.area_id'] = new \Thelia\Core\Form\Type\Field\AreaIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.attribute_av' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\AttributeAvIdType A Thelia\Core\Form\Type\Field\AttributeAvIdType instance.
     */
    protected function getThelia_Form_Type_Field_AttributeAvService()
    {
        return $this->services['thelia.form.type.field.attribute_av'] = new \Thelia\Core\Form\Type\Field\AttributeAvIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.attribute_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\AttributeIdType A Thelia\Core\Form\Type\Field\AttributeIdType instance.
     */
    protected function getThelia_Form_Type_Field_AttributeIdService()
    {
        return $this->services['thelia.form.type.field.attribute_id'] = new \Thelia\Core\Form\Type\Field\AttributeIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.attribute_template_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\AttributeTemplateIdType A Thelia\Core\Form\Type\Field\AttributeTemplateIdType instance.
     */
    protected function getThelia_Form_Type_Field_AttributeTemplateIdService()
    {
        return $this->services['thelia.form.type.field.attribute_template_id'] = new \Thelia\Core\Form\Type\Field\AttributeTemplateIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.brand_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\BrandIdType A Thelia\Core\Form\Type\Field\BrandIdType instance.
     */
    protected function getThelia_Form_Type_Field_BrandIdService()
    {
        return $this->services['thelia.form.type.field.brand_id'] = new \Thelia\Core\Form\Type\Field\BrandIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.cart_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\CartIdType A Thelia\Core\Form\Type\Field\CartIdType instance.
     */
    protected function getThelia_Form_Type_Field_CartIdService()
    {
        return $this->services['thelia.form.type.field.cart_id'] = new \Thelia\Core\Form\Type\Field\CartIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.cart_item_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\CartItemIdType A Thelia\Core\Form\Type\Field\CartItemIdType instance.
     */
    protected function getThelia_Form_Type_Field_CartItemIdService()
    {
        return $this->services['thelia.form.type.field.cart_item_id'] = new \Thelia\Core\Form\Type\Field\CartItemIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.category_associated_content_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\CategoryAssociatedContentIdType A Thelia\Core\Form\Type\Field\CategoryAssociatedContentIdType instance.
     */
    protected function getThelia_Form_Type_Field_CategoryAssociatedContentIdService()
    {
        return $this->services['thelia.form.type.field.category_associated_content_id'] = new \Thelia\Core\Form\Type\Field\CategoryAssociatedContentIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.category_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\CategoryIdType A Thelia\Core\Form\Type\Field\CategoryIdType instance.
     */
    protected function getThelia_Form_Type_Field_CategoryIdService()
    {
        return $this->services['thelia.form.type.field.category_id'] = new \Thelia\Core\Form\Type\Field\CategoryIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.content_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\ContentIdType A Thelia\Core\Form\Type\Field\ContentIdType instance.
     */
    protected function getThelia_Form_Type_Field_ContentIdService()
    {
        return $this->services['thelia.form.type.field.content_id'] = new \Thelia\Core\Form\Type\Field\ContentIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.country_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\CountryIdType A Thelia\Core\Form\Type\Field\CountryIdType instance.
     */
    protected function getThelia_Form_Type_Field_CountryIdService()
    {
        return $this->services['thelia.form.type.field.country_id'] = new \Thelia\Core\Form\Type\Field\CountryIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.coupon_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\CouponIdType A Thelia\Core\Form\Type\Field\CouponIdType instance.
     */
    protected function getThelia_Form_Type_Field_CouponIdService()
    {
        return $this->services['thelia.form.type.field.coupon_id'] = new \Thelia\Core\Form\Type\Field\CouponIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.currency_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\CurrencyIdType A Thelia\Core\Form\Type\Field\CurrencyIdType instance.
     */
    protected function getThelia_Form_Type_Field_CurrencyIdService()
    {
        return $this->services['thelia.form.type.field.currency_id'] = new \Thelia\Core\Form\Type\Field\CurrencyIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.customer_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\CustomerIdType A Thelia\Core\Form\Type\Field\CustomerIdType instance.
     */
    protected function getThelia_Form_Type_Field_CustomerIdService()
    {
        return $this->services['thelia.form.type.field.customer_id'] = new \Thelia\Core\Form\Type\Field\CustomerIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.customer_title_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\CustomerTitleIdType A Thelia\Core\Form\Type\Field\CustomerTitleIdType instance.
     */
    protected function getThelia_Form_Type_Field_CustomerTitleIdService()
    {
        return $this->services['thelia.form.type.field.customer_title_id'] = new \Thelia\Core\Form\Type\Field\CustomerTitleIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.export_category_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\ExportCategoryIdType A Thelia\Core\Form\Type\Field\ExportCategoryIdType instance.
     */
    protected function getThelia_Form_Type_Field_ExportCategoryIdService()
    {
        return $this->services['thelia.form.type.field.export_category_id'] = new \Thelia\Core\Form\Type\Field\ExportCategoryIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.export_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\ExportIdType A Thelia\Core\Form\Type\Field\ExportIdType instance.
     */
    protected function getThelia_Form_Type_Field_ExportIdService()
    {
        return $this->services['thelia.form.type.field.export_id'] = new \Thelia\Core\Form\Type\Field\ExportIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.feature_av_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\FeatureAvIdType A Thelia\Core\Form\Type\Field\FeatureAvIdType instance.
     */
    protected function getThelia_Form_Type_Field_FeatureAvIdService()
    {
        return $this->services['thelia.form.type.field.feature_av_id'] = new \Thelia\Core\Form\Type\Field\FeatureAvIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.feature_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\FeatureIdType A Thelia\Core\Form\Type\Field\FeatureIdType instance.
     */
    protected function getThelia_Form_Type_Field_FeatureIdService()
    {
        return $this->services['thelia.form.type.field.feature_id'] = new \Thelia\Core\Form\Type\Field\FeatureIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.feature_product_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\FeatureProductIdType A Thelia\Core\Form\Type\Field\FeatureProductIdType instance.
     */
    protected function getThelia_Form_Type_Field_FeatureProductIdService()
    {
        return $this->services['thelia.form.type.field.feature_product_id'] = new \Thelia\Core\Form\Type\Field\FeatureProductIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.feature_template_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\FeatureTemplateIdType A Thelia\Core\Form\Type\Field\FeatureTemplateIdType instance.
     */
    protected function getThelia_Form_Type_Field_FeatureTemplateIdService()
    {
        return $this->services['thelia.form.type.field.feature_template_id'] = new \Thelia\Core\Form\Type\Field\FeatureTemplateIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.folder_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\FolderIdType A Thelia\Core\Form\Type\Field\FolderIdType instance.
     */
    protected function getThelia_Form_Type_Field_FolderIdService()
    {
        return $this->services['thelia.form.type.field.folder_id'] = new \Thelia\Core\Form\Type\Field\FolderIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.form_firewall_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\FormFirewallIdType A Thelia\Core\Form\Type\Field\FormFirewallIdType instance.
     */
    protected function getThelia_Form_Type_Field_FormFirewallIdService()
    {
        return $this->services['thelia.form.type.field.form_firewall_id'] = new \Thelia\Core\Form\Type\Field\FormFirewallIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.hook_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\HookIdType A Thelia\Core\Form\Type\Field\HookIdType instance.
     */
    protected function getThelia_Form_Type_Field_HookIdService()
    {
        return $this->services['thelia.form.type.field.hook_id'] = new \Thelia\Core\Form\Type\Field\HookIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.import_category_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\ImportCategoryIdType A Thelia\Core\Form\Type\Field\ImportCategoryIdType instance.
     */
    protected function getThelia_Form_Type_Field_ImportCategoryIdService()
    {
        return $this->services['thelia.form.type.field.import_category_id'] = new \Thelia\Core\Form\Type\Field\ImportCategoryIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.import_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\ImportIdType A Thelia\Core\Form\Type\Field\ImportIdType instance.
     */
    protected function getThelia_Form_Type_Field_ImportIdService()
    {
        return $this->services['thelia.form.type.field.import_id'] = new \Thelia\Core\Form\Type\Field\ImportIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.lang_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\LangIdType A Thelia\Core\Form\Type\Field\LangIdType instance.
     */
    protected function getThelia_Form_Type_Field_LangIdService()
    {
        return $this->services['thelia.form.type.field.lang_id'] = new \Thelia\Core\Form\Type\Field\LangIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.message_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\MessageIdType A Thelia\Core\Form\Type\Field\MessageIdType instance.
     */
    protected function getThelia_Form_Type_Field_MessageIdService()
    {
        return $this->services['thelia.form.type.field.message_id'] = new \Thelia\Core\Form\Type\Field\MessageIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.meta_data_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\MetaDataIdType A Thelia\Core\Form\Type\Field\MetaDataIdType instance.
     */
    protected function getThelia_Form_Type_Field_MetaDataIdService()
    {
        return $this->services['thelia.form.type.field.meta_data_id'] = new \Thelia\Core\Form\Type\Field\MetaDataIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.module_config_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\ModuleConfigIdType A Thelia\Core\Form\Type\Field\ModuleConfigIdType instance.
     */
    protected function getThelia_Form_Type_Field_ModuleConfigIdService()
    {
        return $this->services['thelia.form.type.field.module_config_id'] = new \Thelia\Core\Form\Type\Field\ModuleConfigIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.module_hook_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\ModuleHookIdType A Thelia\Core\Form\Type\Field\ModuleHookIdType instance.
     */
    protected function getThelia_Form_Type_Field_ModuleHookIdService()
    {
        return $this->services['thelia.form.type.field.module_hook_id'] = new \Thelia\Core\Form\Type\Field\ModuleHookIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.module_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\ModuleIdType A Thelia\Core\Form\Type\Field\ModuleIdType instance.
     */
    protected function getThelia_Form_Type_Field_ModuleIdService()
    {
        return $this->services['thelia.form.type.field.module_id'] = new \Thelia\Core\Form\Type\Field\ModuleIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.newsletter_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\NewsletterIdType A Thelia\Core\Form\Type\Field\NewsletterIdType instance.
     */
    protected function getThelia_Form_Type_Field_NewsletterIdService()
    {
        return $this->services['thelia.form.type.field.newsletter_id'] = new \Thelia\Core\Form\Type\Field\NewsletterIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.order_address_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\OrderAddressIdType A Thelia\Core\Form\Type\Field\OrderAddressIdType instance.
     */
    protected function getThelia_Form_Type_Field_OrderAddressIdService()
    {
        return $this->services['thelia.form.type.field.order_address_id'] = new \Thelia\Core\Form\Type\Field\OrderAddressIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.order_coupon_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\OrderCouponIdType A Thelia\Core\Form\Type\Field\OrderCouponIdType instance.
     */
    protected function getThelia_Form_Type_Field_OrderCouponIdService()
    {
        return $this->services['thelia.form.type.field.order_coupon_id'] = new \Thelia\Core\Form\Type\Field\OrderCouponIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.order_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\OrderIdType A Thelia\Core\Form\Type\Field\OrderIdType instance.
     */
    protected function getThelia_Form_Type_Field_OrderIdService()
    {
        return $this->services['thelia.form.type.field.order_id'] = new \Thelia\Core\Form\Type\Field\OrderIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.order_product_attribute_combination_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\OrderProductAttributeCombinationIdType A Thelia\Core\Form\Type\Field\OrderProductAttributeCombinationIdType instance.
     */
    protected function getThelia_Form_Type_Field_OrderProductAttributeCombinationIdService()
    {
        return $this->services['thelia.form.type.field.order_product_attribute_combination_id'] = new \Thelia\Core\Form\Type\Field\OrderProductAttributeCombinationIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.order_product_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\OrderProductIdType A Thelia\Core\Form\Type\Field\OrderProductIdType instance.
     */
    protected function getThelia_Form_Type_Field_OrderProductIdService()
    {
        return $this->services['thelia.form.type.field.order_product_id'] = new \Thelia\Core\Form\Type\Field\OrderProductIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.order_product_tax_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\OrderProductTaxIdType A Thelia\Core\Form\Type\Field\OrderProductTaxIdType instance.
     */
    protected function getThelia_Form_Type_Field_OrderProductTaxIdService()
    {
        return $this->services['thelia.form.type.field.order_product_tax_id'] = new \Thelia\Core\Form\Type\Field\OrderProductTaxIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.order_status_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\OrderStatusIdType A Thelia\Core\Form\Type\Field\OrderStatusIdType instance.
     */
    protected function getThelia_Form_Type_Field_OrderStatusIdService()
    {
        return $this->services['thelia.form.type.field.order_status_id'] = new \Thelia\Core\Form\Type\Field\OrderStatusIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.product_associated_content_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\ProductAssociatedContentIdType A Thelia\Core\Form\Type\Field\ProductAssociatedContentIdType instance.
     */
    protected function getThelia_Form_Type_Field_ProductAssociatedContentIdService()
    {
        return $this->services['thelia.form.type.field.product_associated_content_id'] = new \Thelia\Core\Form\Type\Field\ProductAssociatedContentIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.product_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\ProductIdType A Thelia\Core\Form\Type\Field\ProductIdType instance.
     */
    protected function getThelia_Form_Type_Field_ProductIdService()
    {
        return $this->services['thelia.form.type.field.product_id'] = new \Thelia\Core\Form\Type\Field\ProductIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.product_sale_elements_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\ProductSaleElementsIdType A Thelia\Core\Form\Type\Field\ProductSaleElementsIdType instance.
     */
    protected function getThelia_Form_Type_Field_ProductSaleElementsIdService()
    {
        return $this->services['thelia.form.type.field.product_sale_elements_id'] = new \Thelia\Core\Form\Type\Field\ProductSaleElementsIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.profile_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\ProfileIdType A Thelia\Core\Form\Type\Field\ProfileIdType instance.
     */
    protected function getThelia_Form_Type_Field_ProfileIdService()
    {
        return $this->services['thelia.form.type.field.profile_id'] = new \Thelia\Core\Form\Type\Field\ProfileIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.resource_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\ResourceIdType A Thelia\Core\Form\Type\Field\ResourceIdType instance.
     */
    protected function getThelia_Form_Type_Field_ResourceIdService()
    {
        return $this->services['thelia.form.type.field.resource_id'] = new \Thelia\Core\Form\Type\Field\ResourceIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.rewriting_url_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\RewritingUrlIdType A Thelia\Core\Form\Type\Field\RewritingUrlIdType instance.
     */
    protected function getThelia_Form_Type_Field_RewritingUrlIdService()
    {
        return $this->services['thelia.form.type.field.rewriting_url_id'] = new \Thelia\Core\Form\Type\Field\RewritingUrlIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.sale_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\SaleIdType A Thelia\Core\Form\Type\Field\SaleIdType instance.
     */
    protected function getThelia_Form_Type_Field_SaleIdService()
    {
        return $this->services['thelia.form.type.field.sale_id'] = new \Thelia\Core\Form\Type\Field\SaleIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.sale_product_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\SaleProductIdType A Thelia\Core\Form\Type\Field\SaleProductIdType instance.
     */
    protected function getThelia_Form_Type_Field_SaleProductIdService()
    {
        return $this->services['thelia.form.type.field.sale_product_id'] = new \Thelia\Core\Form\Type\Field\SaleProductIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.tax_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\TaxIdType A Thelia\Core\Form\Type\Field\TaxIdType instance.
     */
    protected function getThelia_Form_Type_Field_TaxIdService()
    {
        return $this->services['thelia.form.type.field.tax_id'] = new \Thelia\Core\Form\Type\Field\TaxIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.tax_rule_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\TaxRuleIdType A Thelia\Core\Form\Type\Field\TaxRuleIdType instance.
     */
    protected function getThelia_Form_Type_Field_TaxRuleIdService()
    {
        return $this->services['thelia.form.type.field.tax_rule_id'] = new \Thelia\Core\Form\Type\Field\TaxRuleIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.field.template_id' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\Field\TemplateIdType A Thelia\Core\Form\Type\Field\TemplateIdType instance.
     */
    protected function getThelia_Form_Type_Field_TemplateIdService()
    {
        return $this->services['thelia.form.type.field.template_id'] = new \Thelia\Core\Form\Type\Field\TemplateIdType($this->get('thelia.translator'));
    }

    /**
     * Gets the 'thelia.form.type.image' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\ImageType A Thelia\Core\Form\Type\ImageType instance.
     */
    protected function getThelia_Form_Type_ImageService()
    {
        return $this->services['thelia.form.type.image'] = new \Thelia\Core\Form\Type\ImageType();
    }

    /**
     * Gets the 'thelia.form.type.product_sale_elements' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\ProductSaleElementsType A Thelia\Core\Form\Type\ProductSaleElementsType instance.
     */
    protected function getThelia_Form_Type_ProductSaleElementsService()
    {
        return $this->services['thelia.form.type.product_sale_elements'] = new \Thelia\Core\Form\Type\ProductSaleElementsType($this->get('thelia.form.type.field.product_id'), $this->get('thelia.form.type.field.product_sale_elements_id'));
    }

    /**
     * Gets the 'thelia.form.type.standard_fields' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\StandardFieldsType A Thelia\Core\Form\Type\StandardFieldsType instance.
     */
    protected function getThelia_Form_Type_StandardFieldsService()
    {
        return $this->services['thelia.form.type.standard_fields'] = new \Thelia\Core\Form\Type\StandardFieldsType();
    }

    /**
     * Gets the 'thelia.form.type.tax_rule' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\TaxRuleType A Thelia\Core\Form\Type\TaxRuleType instance.
     */
    protected function getThelia_Form_Type_TaxRuleService()
    {
        return $this->services['thelia.form.type.tax_rule'] = new \Thelia\Core\Form\Type\TaxRuleType($this->get('thelia.form.type.field.tax_rule_id'));
    }

    /**
     * Gets the 'thelia.form.type.tax_rule_i18n' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\Type\TaxRuleI18nType A Thelia\Core\Form\Type\TaxRuleI18nType instance.
     */
    protected function getThelia_Form_Type_TaxRuleI18nService()
    {
        return $this->services['thelia.form.type.tax_rule_i18n'] = new \Thelia\Core\Form\Type\TaxRuleI18nType();
    }

    /**
     * Gets the 'thelia.form_factory' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\TheliaFormFactory A Thelia\Core\Form\TheliaFormFactory instance.
     * 
     * @throws InactiveScopeException when the 'thelia.form_factory' service is requested while the 'request' scope is not active
     */
    protected function getThelia_FormFactoryService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('thelia.form_factory', 'request');
        }

        return $this->services['thelia.form_factory'] = $this->scopedServices['request']['thelia.form_factory'] = new \Thelia\Core\Form\TheliaFormFactory($this->get('request'), $this, array('thelia.api.empty' => 'Thelia\\Form\\Api\\ApiEmptyForm', 'thelia.api.customer.create' => 'Thelia\\Form\\Api\\Customer\\CustomerCreateForm', 'thelia.api.customer.update' => 'Thelia\\Form\\Api\\Customer\\CustomerUpdateForm', 'thelia.api.customer.login' => 'Thelia\\Form\\Api\\Customer\\CustomerLogin', 'thelia.api.category.create' => 'Thelia\\Form\\Api\\Category\\CategoryCreationForm', 'thelia.api.category.update' => 'Thelia\\Form\\Api\\Category\\CategoryModificationForm', 'thelia.api.product_sale_elements' => 'Thelia\\Form\\Api\\ProductSaleElements\\ProductSaleElementsForm', 'thelia.api.product.creation' => 'Thelia\\Form\\Api\\Product\\ProductCreationForm', 'thelia.api.product.modification' => 'Thelia\\Form\\Api\\Product\\ProductModificationForm', 'thelia.front.customer.login' => 'Thelia\\Form\\CustomerLogin', 'thelia.front.customer.lostpassword' => 'Thelia\\Form\\CustomerLostPasswordForm', 'thelia.front.customer.create' => 'Thelia\\Form\\CustomerCreateForm', 'thelia.front.customer.profile.update' => 'Thelia\\Form\\CustomerProfileUpdateForm', 'thelia.front.customer.password.update' => 'Thelia\\Form\\CustomerPasswordUpdateForm', 'thelia.front.address.create' => 'Thelia\\Form\\AddressCreateForm', 'thelia.front.address.update' => 'Thelia\\Form\\AddressUpdateForm', 'thelia.front.contact' => 'Thelia\\Form\\ContactForm', 'thelia.front.newsletter' => 'Thelia\\Form\\NewsletterForm', 'thelia.admin.login' => 'Thelia\\Form\\AdminLogin', 'thelia.admin.seo' => 'Thelia\\Form\\SeoForm', 'thelia.admin.customer.create' => 'Thelia\\Form\\CustomerCreateForm', 'thelia.admin.customer.update' => 'Thelia\\Form\\CustomerUpdateForm', 'thelia.admin.address.create' => 'Thelia\\Form\\AddressCreateForm', 'thelia.admin.address.update' => 'Thelia\\Form\\AddressUpdateForm', 'thelia.admin.category.creation' => 'Thelia\\Form\\CategoryCreationForm', 'thelia.admin.category.modification' => 'Thelia\\Form\\CategoryModificationForm', 'thelia.admin.category.image.modification' => 'Thelia\\Form\\CategoryImageModification', 'thelia.admin.category.document.modification' => 'Thelia\\Form\\CategoryDocumentModification', 'thelia.admin.product.creation' => 'Thelia\\Form\\ProductCreationForm', 'thelia.admin.product.clone' => 'Thelia\\Form\\ProductCloneForm', 'thelia.admin.product.modification' => 'Thelia\\Form\\ProductModificationForm', 'thelia.admin.product.details.modification' => 'Thelia\\Form\\ProductDetailsModificationForm', 'thelia.admin.product.image.modification' => 'Thelia\\Form\\ProductImageModification', 'thelia.admin.product.document.modification' => 'Thelia\\Form\\ProductDocumentModification', 'thelia.admin.product_sale_element.update' => 'Thelia\\Form\\ProductSaleElementUpdateForm', 'thelia.admin.product_default_sale_element.update' => 'Thelia\\Form\\ProductDefaultSaleElementUpdateForm', 'thelia.admin.product_combination.build' => 'Thelia\\Form\\ProductCombinationGenerationForm', 'thelia.admin.product.deletion' => 'Thelia\\Form\\ProductModificationForm', 'thelia.admin.folder.creation' => 'Thelia\\Form\\FolderCreationForm', 'thelia.admin.folder.modification' => 'Thelia\\Form\\FolderModificationForm', 'thelia.admin.folder.image.modification' => 'Thelia\\Form\\FolderImageModification', 'thelia.admin.folder.document.modification' => 'Thelia\\Form\\FolderDocumentModification', 'thelia.admin.content.creation' => 'Thelia\\Form\\ContentCreationForm', 'thelia.admin.content.modification' => 'Thelia\\Form\\ContentModificationForm', 'thelia.admin.content.image.modification' => 'Thelia\\Form\\ContentImageModification', 'thelia.admin.content.document.modification' => 'Thelia\\Form\\ContentDocumentModification', 'thelia.admin.brand.creation' => 'Thelia\\Form\\Brand\\BrandCreationForm', 'thelia.admin.brand.modification' => 'Thelia\\Form\\Brand\\BrandModificationForm', 'thelia.admin.brand.image.modification' => 'Thelia\\Form\\Brand\\BrandImageModification', 'thelia.admin.brand.document.modification' => 'Thelia\\Form\\Brand\\BrandDocumentModification', 'thelia.cart.add' => 'Thelia\\Form\\CartAdd', 'thelia.order.delivery' => 'Thelia\\Form\\OrderDelivery', 'thelia.order.payment' => 'Thelia\\Form\\OrderPayment', 'thelia.order.update.address' => 'Thelia\\Form\\OrderUpdateAddress', 'thelia.order.coupon' => 'Thelia\\Form\\CouponCode', 'thelia.admin.config.creation' => 'Thelia\\Form\\ConfigCreationForm', 'thelia.admin.config.modification' => 'Thelia\\Form\\ConfigModificationForm', 'thelia.admin.message.creation' => 'Thelia\\Form\\MessageCreationForm', 'thelia.admin.message.modification' => 'Thelia\\Form\\MessageModificationForm', 'thelia.admin.currency.creation' => 'Thelia\\Form\\CurrencyCreationForm', 'thelia.admin.currency.modification' => 'Thelia\\Form\\CurrencyModificationForm', 'thelia.admin.coupon.creation' => 'Thelia\\Form\\CouponCreationForm', 'thelia.admin.attribute.creation' => 'Thelia\\Form\\AttributeCreationForm', 'thelia.admin.attribute.modification' => 'Thelia\\Form\\AttributeModificationForm', 'thelia.admin.feature.creation' => 'Thelia\\Form\\FeatureCreationForm', 'thelia.admin.feature.modification' => 'Thelia\\Form\\FeatureModificationForm', 'thelia.admin.attributeav.creation' => 'Thelia\\Form\\AttributeAvCreationForm', 'thelia.admin.attributeav.modification' => 'Thelia\\Form\\AttributeAvCreationForm', 'thelia.admin.featureav.creation' => 'Thelia\\Form\\FeatureAvCreationForm', 'thelia.admin.taxrule.modification' => 'Thelia\\Form\\TaxRuleModificationForm', 'thelia.admin.taxrule.taxlistupdate' => 'Thelia\\Form\\TaxRuleTaxListUpdateForm', 'thelia.admin.taxrule.add' => 'Thelia\\Form\\TaxRuleCreationForm', 'thelia.admin.tax.modification' => 'Thelia\\Form\\TaxModificationForm', 'thelia.admin.tax.taxlistupdate' => 'Thelia\\Form\\TaxTaxListUpdateForm', 'thelia.admin.tax.add' => 'Thelia\\Form\\TaxCreationForm', 'thelia.admin.profile.add' => 'Thelia\\Form\\ProfileCreationForm', 'thelia.admin.profile.modification' => 'Thelia\\Form\\ProfileModificationForm', 'thelia.admin.profile.resource-access.modification' => 'Thelia\\Form\\ProfileUpdateResourceAccessForm', 'thelia.admin.profile.module-access.modification' => 'Thelia\\Form\\ProfileUpdateModuleAccessForm', 'thelia.admin.administrator.add' => 'Thelia\\Form\\AdministratorCreationForm', 'thelia.admin.administrator.update' => 'Thelia\\Form\\AdministratorModificationForm', 'thelia.admin.mailing-system.update' => 'Thelia\\Form\\MailingSystemModificationForm', 'thelia.admin.template.creation' => 'Thelia\\Form\\TemplateCreationForm', 'thelia.admin.template.modification' => 'Thelia\\Form\\TemplateModificationForm', 'thelia.admin.country.creation' => 'Thelia\\Form\\CountryCreationForm', 'thelia.admin.country.modification' => 'Thelia\\Form\\CountryModificationForm', 'thelia.admin.area.create' => 'Thelia\\Form\\Area\\AreaCreateForm', 'thelia.admin.area.modification' => 'Thelia\\Form\\Area\\AreaModificationForm', 'thelia.admin.area.country' => 'Thelia\\Form\\Area\\AreaCountryForm', 'thelia.admin.area.delete.country' => 'Thelia\\Form\\Area\\AreaDeleteCountryForm', 'thelia.admin.area.postage' => 'Thelia\\Form\\Area\\AreaPostageForm', 'thelia.shopping_zone_area' => 'Thelia\\Form\\ShippingZone\\ShippingZoneAddArea', 'thelia.shipping_zone_area' => 'Thelia\\Form\\ShippingZone\\ShippingZoneAddArea', 'thelia.shopping_zone_remove_area' => 'Thelia\\Form\\ShippingZone\\ShippingZoneRemoveArea', 'thelia.lang.update' => 'Thelia\\Form\\Lang\\LangUpdateForm', 'thelia.lang.create' => 'Thelia\\Form\\Lang\\LangCreateForm', 'thelia.lang.defaultBehavior' => 'Thelia\\Form\\Lang\\LangDefaultBehaviorForm', 'thelia.lang.url' => 'Thelia\\Form\\Lang\\LangUrlForm', 'thelia.configuration.store' => 'Thelia\\Form\\ConfigStoreForm', 'thelia.system-logs.configuration' => 'Thelia\\Form\\SystemLogConfigurationForm', 'thelia.admin.module.modification' => 'Thelia\\Form\\ModuleModificationForm', 'thelia.admin.module.image.modification' => 'Thelia\\Form\\ModuleImageModification', 'thelia.admin.module.install' => 'Thelia\\Form\\ModuleInstallForm', 'thelia.admin.hook.creation' => 'Thelia\\Form\\HookCreationForm', 'thelia.admin.hook.modification' => 'Thelia\\Form\\HookModificationForm', 'thelia.admin.module-hook.creation' => 'Thelia\\Form\\ModuleHookCreationForm', 'thelia.admin.module-hook.modification' => 'Thelia\\Form\\ModuleHookModificationForm', 'thelia.cache.flush' => 'Thelia\\Form\\Cache\\CacheFlushForm', 'thelia.assets.flush' => 'Thelia\\Form\\Cache\\AssetsFlushForm', 'thelia.images-and-documents-cache.flush' => 'Thelia\\Form\\Cache\\ImagesAndDocumentsCacheFlushForm', 'thelia.export' => 'Thelia\\Form\\ExportForm', 'thelia.import' => 'Thelia\\Form\\ImportForm', 'thelia.admin.sale.creation' => 'Thelia\\Form\\Sale\\SaleCreationForm', 'thelia.admin.sale.modification' => 'Thelia\\Form\\Sale\\SaleModificationForm', 'thelia.empty' => 'Thelia\\Form\\EmptyForm', 'thelia_api_create' => 'Thelia\\Form\\Api\\ApiCreateForm', 'thelia_api_update' => 'Thelia\\Form\\Api\\ApiUpdateForm', 'carousel.image' => 'Carousel\\Form\\CarouselImageForm', 'carousel.update' => 'Carousel\\Form\\CarouselUpdateForm', 'hookanalytics.configuration.form' => 'HookAnalytics\\Form\\Configuration', 'hooknavigation.configuration' => 'HookNavigation\\Form\\HookNavigationConfigForm', 'hooksocial.configuration.form' => 'HookSocial\\Form\\Configuration', 'konfigurator.heizlast.berechnung' => 'HookKonfigurator\\Form\\HeizlastBerechnung'));
    }

    /**
     * Gets the 'thelia.form_factory_builder' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\FormFactoryBuilder A Symfony\Component\Form\FormFactoryBuilder instance.
     * 
     * @throws InactiveScopeException when the 'thelia.form_factory_builder' service is requested while the 'request' scope is not active
     */
    protected function getThelia_FormFactoryBuilderService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('thelia.form_factory_builder', 'request');
        }

        $this->services['thelia.form_factory_builder'] = $this->scopedServices['request']['thelia.form_factory_builder'] = $instance = new \Symfony\Component\Form\FormFactoryBuilder();

        $instance->addExtension($this->get('thelia.forms.extension.http_foundation_extension'));
        $instance->addExtension($this->get('thelia.forms.extension.core_extension'));
        $instance->addType($this->get('thelia.form.type.standard_fields'));
        $instance->addType($this->get('thelia.form.type.product_sale_elements'));
        $instance->addType($this->get('thelia.form.type.customer_title'));
        $instance->addType($this->get('thelia.form.type.customer_title_i18n'));
        $instance->addType($this->get('thelia.form.type.tax_rule'));
        $instance->addType($this->get('thelia.form.type.tax_rule_i18n'));
        $instance->addType($this->get('thelia.form.type.image'));
        $instance->addType($this->get('thelia.form.type.field.category_id'));
        $instance->addType($this->get('thelia.form.type.field.product_id'));
        $instance->addType($this->get('thelia.form.type.field.product_sale_elements_id'));
        $instance->addType($this->get('thelia.form.type.field.folder_id'));
        $instance->addType($this->get('thelia.form.type.field.content_id'));
        $instance->addType($this->get('thelia.form.type.field.currency_id'));
        $instance->addType($this->get('thelia.form.type.field.area_id'));
        $instance->addType($this->get('thelia.form.type.field.tax_rule_id'));
        $instance->addType($this->get('thelia.form.type.field.attribute_av'));
        $instance->addType($this->get('thelia.form.type.field.customer_title_id'));
        $instance->addType($this->get('thelia.form.type.field.country_id'));
        $instance->addType($this->get('thelia.form.type.field.tax_id'));
        $instance->addType($this->get('thelia.form.type.field.customer_id'));
        $instance->addType($this->get('thelia.form.type.field.lang_id'));
        $instance->addType($this->get('thelia.form.type.field.accessory_id'));
        $instance->addType($this->get('thelia.form.type.field.address_id'));
        $instance->addType($this->get('thelia.form.type.field.admin_log_id'));
        $instance->addType($this->get('thelia.form.type.field.admin_id'));
        $instance->addType($this->get('thelia.form.type.field.api_id'));
        $instance->addType($this->get('thelia.form.type.field.area_delivery_module_id'));
        $instance->addType($this->get('thelia.form.type.field.attribute_id'));
        $instance->addType($this->get('thelia.form.type.field.attribute_template_id'));
        $instance->addType($this->get('thelia.form.type.field.brand_id'));
        $instance->addType($this->get('thelia.form.type.field.cart_item_id'));
        $instance->addType($this->get('thelia.form.type.field.cart_id'));
        $instance->addType($this->get('thelia.form.type.field.category_associated_content_id'));
        $instance->addType($this->get('thelia.form.type.field.coupon_id'));
        $instance->addType($this->get('thelia.form.type.field.export_category_id'));
        $instance->addType($this->get('thelia.form.type.field.export_id'));
        $instance->addType($this->get('thelia.form.type.field.feature_av_id'));
        $instance->addType($this->get('thelia.form.type.field.feature_product_id'));
        $instance->addType($this->get('thelia.form.type.field.feature_id'));
        $instance->addType($this->get('thelia.form.type.field.feature_template_id'));
        $instance->addType($this->get('thelia.form.type.field.form_firewall_id'));
        $instance->addType($this->get('thelia.form.type.field.hook_id'));
        $instance->addType($this->get('thelia.form.type.field.import_category_id'));
        $instance->addType($this->get('thelia.form.type.field.import_id'));
        $instance->addType($this->get('thelia.form.type.field.message_id'));
        $instance->addType($this->get('thelia.form.type.field.meta_data_id'));
        $instance->addType($this->get('thelia.form.type.field.module_config_id'));
        $instance->addType($this->get('thelia.form.type.field.module_hook_id'));
        $instance->addType($this->get('thelia.form.type.field.module_id'));
        $instance->addType($this->get('thelia.form.type.field.newsletter_id'));
        $instance->addType($this->get('thelia.form.type.field.order_address_id'));
        $instance->addType($this->get('thelia.form.type.field.order_coupon_id'));
        $instance->addType($this->get('thelia.form.type.field.order_product_attribute_combination_id'));
        $instance->addType($this->get('thelia.form.type.field.order_product_id'));
        $instance->addType($this->get('thelia.form.type.field.order_product_tax_id'));
        $instance->addType($this->get('thelia.form.type.field.order_id'));
        $instance->addType($this->get('thelia.form.type.field.order_status_id'));
        $instance->addType($this->get('thelia.form.type.field.product_associated_content_id'));
        $instance->addType($this->get('thelia.form.type.field.profile_id'));
        $instance->addType($this->get('thelia.form.type.field.resource_id'));
        $instance->addType($this->get('thelia.form.type.field.rewriting_url_id'));
        $instance->addType($this->get('thelia.form.type.field.sale_product_id'));
        $instance->addType($this->get('thelia.form.type.field.sale_id'));
        $instance->addType($this->get('thelia.form.type.field.template_id'));

        return $instance;
    }

    /**
     * Gets the 'thelia.form_validator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Form\TheliaFormValidator A Thelia\Core\Form\TheliaFormValidator instance.
     */
    protected function getThelia_FormValidatorService()
    {
        return $this->services['thelia.form_validator'] = new \Thelia\Core\Form\TheliaFormValidator($this->get('thelia.translator'), 'dev');
    }

    /**
     * Gets the 'thelia.formatter.csv_formatter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\FileFormat\Formatting\Formatter\CSVFormatter A Thelia\Core\FileFormat\Formatting\Formatter\CSVFormatter instance.
     */
    protected function getThelia_Formatter_CsvFormatterService()
    {
        return $this->services['thelia.formatter.csv_formatter'] = new \Thelia\Core\FileFormat\Formatting\Formatter\CSVFormatter();
    }

    /**
     * Gets the 'thelia.formatter.json_formatter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\FileFormat\Formatting\Formatter\JsonFormatter A Thelia\Core\FileFormat\Formatting\Formatter\JsonFormatter instance.
     */
    protected function getThelia_Formatter_JsonFormatterService()
    {
        return $this->services['thelia.formatter.json_formatter'] = new \Thelia\Core\FileFormat\Formatting\Formatter\JsonFormatter();
    }

    /**
     * Gets the 'thelia.formatter.xml_formatter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\FileFormat\Formatting\Formatter\XMLFormatter A Thelia\Core\FileFormat\Formatting\Formatter\XMLFormatter instance.
     */
    protected function getThelia_Formatter_XmlFormatterService()
    {
        return $this->services['thelia.formatter.xml_formatter'] = new \Thelia\Core\FileFormat\Formatting\Formatter\XMLFormatter();
    }

    /**
     * Gets the 'thelia.forms.extension.core_extension' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\Core\CoreExtension A Symfony\Component\Form\Extension\Core\CoreExtension instance.
     */
    protected function getThelia_Forms_Extension_CoreExtensionService()
    {
        return $this->services['thelia.forms.extension.core_extension'] = new \Symfony\Component\Form\Extension\Core\CoreExtension();
    }

    /**
     * Gets the 'thelia.forms.extension.http_foundation_extension' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Form\Extension\HttpFoundation\HttpFoundationExtension A Symfony\Component\Form\Extension\HttpFoundation\HttpFoundationExtension instance.
     */
    protected function getThelia_Forms_Extension_HttpFoundationExtensionService()
    {
        return $this->services['thelia.forms.extension.http_foundation_extension'] = new \Symfony\Component\Form\Extension\HttpFoundation\HttpFoundationExtension();
    }

    /**
     * Gets the 'thelia.forms.validator_builder' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Validator\ValidatorBuilder A Symfony\Component\Validator\ValidatorBuilder instance.
     */
    protected function getThelia_Forms_ValidatorBuilderService()
    {
        $this->services['thelia.forms.validator_builder'] = $instance = new \Symfony\Component\Validator\ValidatorBuilder();

        $instance->setTranslationDomain('validators');
        $instance->setTranslator($this->get('thelia.translator'));

        return $instance;
    }

    /**
     * Gets the 'thelia.hookhelper' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Hook\HookHelper A Thelia\Core\Hook\HookHelper instance.
     */
    protected function getThelia_HookhelperService()
    {
        return $this->services['thelia.hookhelper'] = new \Thelia\Core\Hook\HookHelper($this->get('thelia.parser.helper'));
    }

    /**
     * Gets the 'thelia.import.change_position' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\Import A Thelia\Action\Import instance.
     */
    protected function getThelia_Import_ChangePositionService()
    {
        return $this->services['thelia.import.change_position'] = new \Thelia\Action\Import(__DIR__);
    }

    /**
     * Gets the 'thelia.listener.view' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\EventListener\ViewListener A Thelia\Core\EventListener\ViewListener instance.
     */
    protected function getThelia_Listener_ViewService()
    {
        return $this->services['thelia.listener.view'] = new \Thelia\Core\EventListener\ViewListener($this);
    }

    /**
     * Gets the 'thelia.logger' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Log\Tlog A Thelia\Log\Tlog instance.
     */
    protected function getThelia_LoggerService()
    {
        return $this->services['thelia.logger'] = call_user_func(array('Thelia\\Log\\Tlog', 'getInstance'));
    }

    /**
     * Gets the 'thelia.manager.archive_builder_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\FileFormat\Archive\ArchiveBuilderManager A Thelia\Core\FileFormat\Archive\ArchiveBuilderManager instance.
     */
    protected function getThelia_Manager_ArchiveBuilderManagerService()
    {
        $this->services['thelia.manager.archive_builder_manager'] = $instance = new \Thelia\Core\FileFormat\Archive\ArchiveBuilderManager('dev');

        $instance->add($this->get('thelia.archive_builder.zip'));
        $instance->add($this->get('thelia.archive_builder.tar'));
        $instance->add($this->get('thelia.archive_builder.tar_gz'));
        $instance->add($this->get('thelia.archive_builder.tar_bz2'));

        return $instance;
    }

    /**
     * Gets the 'thelia.manager.formatter_manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\FileFormat\Formatting\FormatterManager A Thelia\Core\FileFormat\Formatting\FormatterManager instance.
     */
    protected function getThelia_Manager_FormatterManagerService()
    {
        $this->services['thelia.manager.formatter_manager'] = $instance = new \Thelia\Core\FileFormat\Formatting\FormatterManager();

        $instance->add($this->get('thelia.formatter.xml_formatter'));
        $instance->add($this->get('thelia.formatter.json_formatter'));
        $instance->add($this->get('thelia.formatter.csv_formatter'));

        return $instance;
    }

    /**
     * Gets the 'thelia.metadata' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Action\MetaData A Thelia\Action\MetaData instance.
     */
    protected function getThelia_MetadataService()
    {
        return $this->services['thelia.metadata'] = new \Thelia\Action\MetaData();
    }

    /**
     * Gets the 'thelia.parser' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \TheliaSmarty\Template\SmartyParser A TheliaSmarty\Template\SmartyParser instance.
     * 
     * @throws InactiveScopeException when the 'thelia.parser' service is requested while the 'request' scope is not active
     */
    protected function getThelia_ParserService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('thelia.parser', 'request');
        }

        $this->services['thelia.parser'] = $this->scopedServices['request']['thelia.parser'] = $instance = new \TheliaSmarty\Template\SmartyParser($this->get('request'), $this->get('event_dispatcher'), $this->get('thelia.parser.context'), $this->get('thelia.template_helper'), 'dev', true);

        $instance->addTemplateDirectory(1, 'default', ($this->targetDirs[2].'\\local\\modules\\Carousel\\templates\\frontOffice\\default'), 'Carousel');
        $instance->addTemplateDirectory(1, 'default', ($this->targetDirs[2].'\\local\\modules\\HookCurrency\\templates\\frontOffice\\default'), 'HookCurrency');
        $instance->addTemplateDirectory(1, 'default', ($this->targetDirs[2].'\\local\\modules\\HookLang\\templates\\frontOffice\\default'), 'HookLang');
        $instance->addTemplateDirectory(1, 'default', ($this->targetDirs[2].'\\local\\modules\\HookSearch\\templates\\frontOffice\\default'), 'HookSearch');
        $instance->addTemplateDirectory(1, 'default', ($this->targetDirs[2].'\\local\\modules\\HookCustomer\\templates\\frontOffice\\default'), 'HookCustomer');
        $instance->addTemplateDirectory(1, 'default', ($this->targetDirs[2].'\\local\\modules\\HookCart\\templates\\frontOffice\\default'), 'HookCart');
        $instance->addTemplateDirectory(1, 'default', ($this->targetDirs[2].'\\local\\modules\\HookContact\\templates\\frontOffice\\default'), 'HookContact');
        $instance->addTemplateDirectory(1, 'default', ($this->targetDirs[2].'\\local\\modules\\HookLinks\\templates\\frontOffice\\default'), 'HookLinks');
        $instance->addTemplateDirectory(1, 'default', ($this->targetDirs[2].'\\local\\modules\\HookNavigation\\templates\\frontOffice\\default'), 'HookNavigation');
        $instance->addTemplateDirectory(2, 'default', ($this->targetDirs[2].'\\local\\modules\\HookNavigation\\templates\\backOffice\\default'), 'HookNavigation');
        $instance->addTemplateDirectory(1, 'default', ($this->targetDirs[2].'\\local\\modules\\HookNewsletter\\templates\\frontOffice\\default'), 'HookNewsletter');
        $instance->addTemplateDirectory(1, 'default', ($this->targetDirs[2].'\\local\\modules\\HookSocial\\templates\\frontOffice\\default'), 'HookSocial');
        $instance->addTemplateDirectory(1, 'default', ($this->targetDirs[2].'\\local\\modules\\HookProductsNew\\templates\\frontOffice\\default'), 'HookProductsNew');
        $instance->addTemplateDirectory(1, 'default', ($this->targetDirs[2].'\\local\\modules\\HookProductsOffer\\templates\\frontOffice\\default'), 'HookProductsOffer');
        $instance->addTemplateDirectory(2, 'default', ($this->targetDirs[2].'\\local\\modules\\VirtualProductControl\\templates\\backOffice\\default'), 'VirtualProductControl');
        $instance->addTemplateDirectory(1, 'default', ($this->targetDirs[2].'\\local\\modules\\HookKonfigurator\\templates\\frontOffice\\default'), 'HookKonfigurator');
        $instance->addPlugins($this->get('smarty.plugin.assets'));
        $instance->addPlugins($this->get('smarty.plugin.format'));
        $instance->addPlugins($this->get('smarty.plugin.thelialoop'));
        $instance->addPlugins($this->get('smarty.plugin.cartpostage'));
        $instance->addPlugins($this->get('smarty.plugin.type'));
        $instance->addPlugins($this->get('smarty.plugin.render'));
        $instance->addPlugins($this->get('smart.plugin.form'));
        $instance->addPlugins($this->get('smarty.plugin.translation'));
        $instance->addPlugins($this->get('smarty.plugin.module'));
        $instance->addPlugins($this->get('smarty.url.module'));
        $instance->addPlugins($this->get('smarty.plugin.security'));
        $instance->addPlugins($this->get('smarty.plugin.dataaccess'));
        $instance->addPlugins($this->get('smarty.plugin.adminutilities'));
        $instance->addPlugins($this->get('smarty.plugin.flashmessage'));
        $instance->addPlugins($this->get('smarty.plugin.esi'));
        $instance->addPlugins($this->get('smarty.plugin.hook'));
        $instance->registerPlugins();

        return $instance;
    }

    /**
     * Gets the 'thelia.parser.asset.resolver' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \TheliaSmarty\Template\Assets\SmartyAssetsResolver A TheliaSmarty\Template\Assets\SmartyAssetsResolver instance.
     */
    protected function getThelia_Parser_Asset_ResolverService()
    {
        return $this->services['thelia.parser.asset.resolver'] = new \TheliaSmarty\Template\Assets\SmartyAssetsResolver($this->get('assetic.asset.manager'));
    }

    /**
     * Gets the 'thelia.parser.context' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Template\ParserContext A Thelia\Core\Template\ParserContext instance.
     * 
     * @throws InactiveScopeException when the 'thelia.parser.context' service is requested while the 'request' scope is not active
     */
    protected function getThelia_Parser_ContextService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('thelia.parser.context', 'request');
        }

        return $this->services['thelia.parser.context'] = $this->scopedServices['request']['thelia.parser.context'] = new \Thelia\Core\Template\ParserContext($this->get('request'), $this->get('thelia.form_factory'), $this->get('thelia.form_validator'));
    }

    /**
     * Gets the 'thelia.parser.helper' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \TheliaSmarty\Template\SmartyHelper A TheliaSmarty\Template\SmartyHelper instance.
     */
    protected function getThelia_Parser_HelperService()
    {
        return $this->services['thelia.parser.helper'] = new \TheliaSmarty\Template\SmartyHelper();
    }

    /**
     * Gets the 'thelia.securitycontext' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Security\SecurityContext A Thelia\Core\Security\SecurityContext instance.
     * 
     * @throws InactiveScopeException when the 'thelia.securitycontext' service is requested while the 'request' scope is not active
     */
    protected function getThelia_SecuritycontextService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('thelia.securitycontext', 'request');
        }

        return $this->services['thelia.securitycontext'] = $this->scopedServices['request']['thelia.securitycontext'] = new \Thelia\Core\Security\SecurityContext($this->get('request'));
    }

    /**
     * Gets the 'thelia.taxengine' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\TaxEngine\TaxEngine A Thelia\TaxEngine\TaxEngine instance.
     * 
     * @throws InactiveScopeException when the 'thelia.taxengine' service is requested while the 'request' scope is not active
     */
    protected function getThelia_TaxengineService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('thelia.taxengine', 'request');
        }

        return $this->services['thelia.taxengine'] = $this->scopedServices['request']['thelia.taxengine'] = new \Thelia\TaxEngine\TaxEngine($this->get('request'));
    }

    /**
     * Gets the 'thelia.template_helper' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Template\TheliaTemplateHelper A Thelia\Core\Template\TheliaTemplateHelper instance.
     */
    protected function getThelia_TemplateHelperService()
    {
        return $this->services['thelia.template_helper'] = new \Thelia\Core\Template\TheliaTemplateHelper();
    }

    /**
     * Gets the 'thelia.token_provider' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Tools\TokenProvider A Thelia\Tools\TokenProvider instance.
     * 
     * @throws InactiveScopeException when the 'thelia.token_provider' service is requested while the 'request' scope is not active
     */
    protected function getThelia_TokenProviderService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('thelia.token_provider', 'request');
        }

        return $this->services['thelia.token_provider'] = $this->scopedServices['request']['thelia.token_provider'] = new \Thelia\Tools\TokenProvider($this->get('request'), $this->get('thelia.translator'), 'thelia.token_provider');
    }

    /**
     * Gets the 'thelia.translator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\Translation\Translator A Thelia\Core\Translation\Translator instance.
     */
    protected function getThelia_TranslatorService()
    {
        $a = $this->get('translation.loader.yml');
        $b = $this->get('translation.loader.xliff');

        $this->services['thelia.translator'] = $instance = new \Thelia\Core\Translation\Translator($this);

        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\Carousel\\I18n\\de_DE.php'), 'de_DE', 'carousel');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\Carousel\\I18n\\en_US.php'), 'en_US', 'carousel');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\Carousel\\I18n\\fr_FR.php'), 'fr_FR', 'carousel');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\Carousel\\I18n\\it_IT.php'), 'it_IT', 'carousel');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\Carousel\\I18n\\tr_TR.php'), 'tr_TR', 'carousel');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\Carousel\\I18n\\AdminIncludes\\de_DE.php'), 'de_DE', 'carousel.ai');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\Carousel\\I18n\\AdminIncludes\\en_US.php'), 'en_US', 'carousel.ai');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\Carousel\\I18n\\AdminIncludes\\fr_FR.php'), 'fr_FR', 'carousel.ai');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\Carousel\\I18n\\AdminIncludes\\it_IT.php'), 'it_IT', 'carousel.ai');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\Carousel\\I18n\\AdminIncludes\\tr_TR.php'), 'tr_TR', 'carousel.ai');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\Front\\I18n\\de_DE.php'), 'de_DE', 'front');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\Front\\I18n\\en_US.php'), 'en_US', 'front');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\Front\\I18n\\fr_FR.php'), 'fr_FR', 'front');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\Front\\I18n\\it_IT.php'), 'it_IT', 'front');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\Front\\I18n\\tr_TR.php'), 'tr_TR', 'front');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookSearch\\I18n\\frontOffice\\default\\de_DE.php'), 'de_DE', 'hooksearch.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookSearch\\I18n\\frontOffice\\default\\en_US.php'), 'en_US', 'hooksearch.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookSearch\\I18n\\frontOffice\\default\\fr_FR.php'), 'fr_FR', 'hooksearch.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookSearch\\I18n\\frontOffice\\default\\it_IT.php'), 'it_IT', 'hooksearch.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookSearch\\I18n\\frontOffice\\default\\tr_TR.php'), 'tr_TR', 'hooksearch.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookCustomer\\I18n\\frontOffice\\default\\de_DE.php'), 'de_DE', 'hookcustomer.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookCustomer\\I18n\\frontOffice\\default\\en_US.php'), 'en_US', 'hookcustomer.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookCustomer\\I18n\\frontOffice\\default\\fr_FR.php'), 'fr_FR', 'hookcustomer.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookCustomer\\I18n\\frontOffice\\default\\it_IT.php'), 'it_IT', 'hookcustomer.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookCustomer\\I18n\\frontOffice\\default\\tr_TR.php'), 'tr_TR', 'hookcustomer.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookCart\\I18n\\frontOffice\\default\\de_DE.php'), 'de_DE', 'hookcart.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookCart\\I18n\\frontOffice\\default\\en_US.php'), 'en_US', 'hookcart.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookCart\\I18n\\frontOffice\\default\\fr_FR.php'), 'fr_FR', 'hookcart.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookCart\\I18n\\frontOffice\\default\\it_IT.php'), 'it_IT', 'hookcart.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookCart\\I18n\\frontOffice\\default\\tr_TR.php'), 'tr_TR', 'hookcart.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookAnalytics\\I18n\\de_DE.php'), 'de_DE', 'hookanalytics');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookAnalytics\\I18n\\en_US.php'), 'en_US', 'hookanalytics');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookAnalytics\\I18n\\fr_FR.php'), 'fr_FR', 'hookanalytics');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookAnalytics\\I18n\\it_IT.php'), 'it_IT', 'hookanalytics');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookAnalytics\\I18n\\tr_TR.php'), 'tr_TR', 'hookanalytics');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookAnalytics\\I18n\\AdminIncludes\\de_DE.php'), 'de_DE', 'hookanalytics.ai');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookAnalytics\\I18n\\AdminIncludes\\en_US.php'), 'en_US', 'hookanalytics.ai');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookAnalytics\\I18n\\AdminIncludes\\fr_FR.php'), 'fr_FR', 'hookanalytics.ai');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookAnalytics\\I18n\\AdminIncludes\\it_IT.php'), 'it_IT', 'hookanalytics.ai');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookAnalytics\\I18n\\AdminIncludes\\tr_TR.php'), 'tr_TR', 'hookanalytics.ai');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookContact\\I18n\\de_DE.php'), 'de_DE', 'hookcontact');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookContact\\I18n\\en_US.php'), 'en_US', 'hookcontact');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookContact\\I18n\\fr_FR.php'), 'fr_FR', 'hookcontact');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookContact\\I18n\\it_IT.php'), 'it_IT', 'hookcontact');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookContact\\I18n\\tr_TR.php'), 'tr_TR', 'hookcontact');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookLinks\\I18n\\de_DE.php'), 'de_DE', 'hooklinks');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookLinks\\I18n\\en_US.php'), 'en_US', 'hooklinks');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookLinks\\I18n\\fr_FR.php'), 'fr_FR', 'hooklinks');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookLinks\\I18n\\it_IT.php'), 'it_IT', 'hooklinks');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookLinks\\I18n\\tr_TR.php'), 'tr_TR', 'hooklinks');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookLinks\\I18n\\frontOffice\\default\\de_DE.php'), 'de_DE', 'hooklinks.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookLinks\\I18n\\frontOffice\\default\\en_US.php'), 'en_US', 'hooklinks.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookLinks\\I18n\\frontOffice\\default\\fr_FR.php'), 'fr_FR', 'hooklinks.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookLinks\\I18n\\frontOffice\\default\\it_IT.php'), 'it_IT', 'hooklinks.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookLinks\\I18n\\frontOffice\\default\\tr_TR.php'), 'tr_TR', 'hooklinks.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookNavigation\\I18n\\en_US.php'), 'en_US', 'hooknavigation');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookNavigation\\I18n\\fr_FR.php'), 'fr_FR', 'hooknavigation');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookNavigation\\I18n\\backOffice\\default\\de_DE.php'), 'de_DE', 'hooknavigation.bo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookNavigation\\I18n\\backOffice\\default\\en_US.php'), 'en_US', 'hooknavigation.bo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookNavigation\\I18n\\backOffice\\default\\fr_FR.php'), 'fr_FR', 'hooknavigation.bo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookNavigation\\I18n\\backOffice\\default\\it_IT.php'), 'it_IT', 'hooknavigation.bo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookNavigation\\I18n\\backOffice\\default\\tr_TR.php'), 'tr_TR', 'hooknavigation.bo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookNavigation\\I18n\\frontOffice\\default\\de_DE.php'), 'de_DE', 'hooknavigation.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookNavigation\\I18n\\frontOffice\\default\\en_US.php'), 'en_US', 'hooknavigation.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookNavigation\\I18n\\frontOffice\\default\\fr_FR.php'), 'fr_FR', 'hooknavigation.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookNavigation\\I18n\\frontOffice\\default\\it_IT.php'), 'it_IT', 'hooknavigation.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookNavigation\\I18n\\frontOffice\\default\\tr_TR.php'), 'tr_TR', 'hooknavigation.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookNewsletter\\I18n\\de_DE.php'), 'de_DE', 'hooknewsletter');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookNewsletter\\I18n\\en_US.php'), 'en_US', 'hooknewsletter');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookNewsletter\\I18n\\fr_FR.php'), 'fr_FR', 'hooknewsletter');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookNewsletter\\I18n\\it_IT.php'), 'it_IT', 'hooknewsletter');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookNewsletter\\I18n\\tr_TR.php'), 'tr_TR', 'hooknewsletter');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookNewsletter\\I18n\\frontOffice\\default\\de_DE.php'), 'de_DE', 'hooknewsletter.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookNewsletter\\I18n\\frontOffice\\default\\en_US.php'), 'en_US', 'hooknewsletter.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookNewsletter\\I18n\\frontOffice\\default\\fr_FR.php'), 'fr_FR', 'hooknewsletter.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookNewsletter\\I18n\\frontOffice\\default\\it_IT.php'), 'it_IT', 'hooknewsletter.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookNewsletter\\I18n\\frontOffice\\default\\tr_TR.php'), 'tr_TR', 'hooknewsletter.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookSocial\\I18n\\de_DE.php'), 'de_DE', 'hooksocial');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookSocial\\I18n\\en_US.php'), 'en_US', 'hooksocial');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookSocial\\I18n\\fr_FR.php'), 'fr_FR', 'hooksocial');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookSocial\\I18n\\it_IT.php'), 'it_IT', 'hooksocial');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookSocial\\I18n\\tr_TR.php'), 'tr_TR', 'hooksocial');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookSocial\\I18n\\AdminIncludes\\de_DE.php'), 'de_DE', 'hooksocial.ai');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookSocial\\I18n\\AdminIncludes\\en_US.php'), 'en_US', 'hooksocial.ai');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookSocial\\I18n\\AdminIncludes\\fr_FR.php'), 'fr_FR', 'hooksocial.ai');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookSocial\\I18n\\AdminIncludes\\it_IT.php'), 'it_IT', 'hooksocial.ai');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookSocial\\I18n\\AdminIncludes\\tr_TR.php'), 'tr_TR', 'hooksocial.ai');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookSocial\\I18n\\frontOffice\\default\\de_DE.php'), 'de_DE', 'hooksocial.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookSocial\\I18n\\frontOffice\\default\\en_US.php'), 'en_US', 'hooksocial.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookSocial\\I18n\\frontOffice\\default\\fr_FR.php'), 'fr_FR', 'hooksocial.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookSocial\\I18n\\frontOffice\\default\\it_IT.php'), 'it_IT', 'hooksocial.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookSocial\\I18n\\frontOffice\\default\\tr_TR.php'), 'tr_TR', 'hooksocial.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookProductsNew\\I18n\\frontOffice\\default\\de_DE.php'), 'de_DE', 'hookproductsnew.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookProductsNew\\I18n\\frontOffice\\default\\en_US.php'), 'en_US', 'hookproductsnew.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookProductsNew\\I18n\\frontOffice\\default\\fr_FR.php'), 'fr_FR', 'hookproductsnew.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookProductsNew\\I18n\\frontOffice\\default\\it_IT.php'), 'it_IT', 'hookproductsnew.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookProductsNew\\I18n\\frontOffice\\default\\tr_TR.php'), 'tr_TR', 'hookproductsnew.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookProductsOffer\\I18n\\frontOffice\\default\\de_DE.php'), 'de_DE', 'hookproductsoffer.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookProductsOffer\\I18n\\frontOffice\\default\\en_US.php'), 'en_US', 'hookproductsoffer.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookProductsOffer\\I18n\\frontOffice\\default\\fr_FR.php'), 'fr_FR', 'hookproductsoffer.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookProductsOffer\\I18n\\frontOffice\\default\\it_IT.php'), 'it_IT', 'hookproductsoffer.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookProductsOffer\\I18n\\frontOffice\\default\\tr_TR.php'), 'tr_TR', 'hookproductsoffer.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\TheliaSmarty\\I18n\\de_DE.php'), 'de_DE', 'theliasmarty');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\TheliaSmarty\\I18n\\en_US.php'), 'en_US', 'theliasmarty');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\TheliaSmarty\\I18n\\fr_FR.php'), 'fr_FR', 'theliasmarty');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\TheliaSmarty\\I18n\\it_IT.php'), 'it_IT', 'theliasmarty');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\TheliaSmarty\\I18n\\tr_TR.php'), 'tr_TR', 'theliasmarty');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\VirtualProductControl\\I18n\\de_DE.php'), 'de_DE', 'virtualproductcontrol');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\VirtualProductControl\\I18n\\en_US.php'), 'en_US', 'virtualproductcontrol');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\VirtualProductControl\\I18n\\fr_FR.php'), 'fr_FR', 'virtualproductcontrol');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\VirtualProductControl\\I18n\\it_IT.php'), 'it_IT', 'virtualproductcontrol');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\VirtualProductControl\\I18n\\tr_TR.php'), 'tr_TR', 'virtualproductcontrol');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\VirtualProductControl\\I18n\\backOffice\\default\\de_DE.php'), 'de_DE', 'virtualproductcontrol.bo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\VirtualProductControl\\I18n\\backOffice\\default\\en_US.php'), 'en_US', 'virtualproductcontrol.bo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\VirtualProductControl\\I18n\\backOffice\\default\\fr_FR.php'), 'fr_FR', 'virtualproductcontrol.bo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\VirtualProductControl\\I18n\\backOffice\\default\\it_IT.php'), 'it_IT', 'virtualproductcontrol.bo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\VirtualProductControl\\I18n\\backOffice\\default\\tr_TR.php'), 'tr_TR', 'virtualproductcontrol.bo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookKonfigurator\\I18n\\de_DE.php'), 'de_DE', 'hookkonfigurator');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookKonfigurator\\I18n\\en_US.php'), 'en_US', 'hookkonfigurator');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookKonfigurator\\I18n\\frontOffice\\default\\de_DE.php'), 'de_DE', 'hookkonfigurator.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookKonfigurator\\I18n\\frontOffice\\default\\en_US.php'), 'en_US', 'hookkonfigurator.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\local\\modules\\HookKonfigurator\\I18n\\frontOffice\\default\\fr_FR.php'), 'fr_FR', 'hookkonfigurator.fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\core\\lib\\Thelia\\Config\\I18n\\ar_SA.php'), 'ar_SA', 'core');
        $instance->addResource('php', ($this->targetDirs[2].'\\core\\lib\\Thelia\\Config\\I18n\\cs_CZ.php'), 'cs_CZ', 'core');
        $instance->addResource('php', ($this->targetDirs[2].'\\core\\lib\\Thelia\\Config\\I18n\\de_DE.php'), 'de_DE', 'core');
        $instance->addResource('php', ($this->targetDirs[2].'\\core\\lib\\Thelia\\Config\\I18n\\el_GR.php'), 'el_GR', 'core');
        $instance->addResource('php', ($this->targetDirs[2].'\\core\\lib\\Thelia\\Config\\I18n\\en_US.php'), 'en_US', 'core');
        $instance->addResource('php', ($this->targetDirs[2].'\\core\\lib\\Thelia\\Config\\I18n\\es_ES.php'), 'es_ES', 'core');
        $instance->addResource('php', ($this->targetDirs[2].'\\core\\lib\\Thelia\\Config\\I18n\\fr_FR.php'), 'fr_FR', 'core');
        $instance->addResource('php', ($this->targetDirs[2].'\\core\\lib\\Thelia\\Config\\I18n\\id_ID.php'), 'id_ID', 'core');
        $instance->addResource('php', ($this->targetDirs[2].'\\core\\lib\\Thelia\\Config\\I18n\\it_IT.php'), 'it_IT', 'core');
        $instance->addResource('php', ($this->targetDirs[2].'\\core\\lib\\Thelia\\Config\\I18n\\nl_NL.php'), 'nl_NL', 'core');
        $instance->addResource('php', ($this->targetDirs[2].'\\core\\lib\\Thelia\\Config\\I18n\\ru_RU.php'), 'ru_RU', 'core');
        $instance->addResource('php', ($this->targetDirs[2].'\\core\\lib\\Thelia\\Config\\I18n\\tr_TR.php'), 'tr_TR', 'core');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\frontOffice\\default\\I18n\\ar_SA.php'), 'ar_SA', 'fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\frontOffice\\default\\I18n\\cs_CZ.php'), 'cs_CZ', 'fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\frontOffice\\default\\I18n\\de_DE.php'), 'de_DE', 'fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\frontOffice\\default\\I18n\\el_GR.php'), 'el_GR', 'fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\frontOffice\\default\\I18n\\en_US.php'), 'en_US', 'fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\frontOffice\\default\\I18n\\es_ES.php'), 'es_ES', 'fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\frontOffice\\default\\I18n\\fr_FR.php'), 'fr_FR', 'fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\frontOffice\\default\\I18n\\it_IT.php'), 'it_IT', 'fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\frontOffice\\default\\I18n\\pt_PT.php'), 'pt_PT', 'fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\frontOffice\\default\\I18n\\ru_RU.php'), 'ru_RU', 'fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\frontOffice\\default\\I18n\\tr_TR.php'), 'tr_TR', 'fo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\backOffice\\default\\I18n\\ar_SA.php'), 'ar_SA', 'bo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\backOffice\\default\\I18n\\cs_CZ.php'), 'cs_CZ', 'bo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\backOffice\\default\\I18n\\de_DE.php'), 'de_DE', 'bo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\backOffice\\default\\I18n\\el_GR.php'), 'el_GR', 'bo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\backOffice\\default\\I18n\\en_US.php'), 'en_US', 'bo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\backOffice\\default\\I18n\\es_ES.php'), 'es_ES', 'bo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\backOffice\\default\\I18n\\fr_FR.php'), 'fr_FR', 'bo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\backOffice\\default\\I18n\\it_IT.php'), 'it_IT', 'bo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\backOffice\\default\\I18n\\nl_NL.php'), 'nl_NL', 'bo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\backOffice\\default\\I18n\\pt_BR.php'), 'pt_BR', 'bo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\backOffice\\default\\I18n\\pt_PT.php'), 'pt_PT', 'bo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\backOffice\\default\\I18n\\ru_RU.php'), 'ru_RU', 'bo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\backOffice\\default\\I18n\\tr_TR.php'), 'tr_TR', 'bo.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\pdf\\default\\I18n\\ar_SA.php'), 'ar_SA', 'pdf.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\pdf\\default\\I18n\\cs_CZ.php'), 'cs_CZ', 'pdf.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\pdf\\default\\I18n\\de_DE.php'), 'de_DE', 'pdf.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\pdf\\default\\I18n\\el_GR.php'), 'el_GR', 'pdf.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\pdf\\default\\I18n\\en_US.php'), 'en_US', 'pdf.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\pdf\\default\\I18n\\es_ES.php'), 'es_ES', 'pdf.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\pdf\\default\\I18n\\fr_FR.php'), 'fr_FR', 'pdf.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\pdf\\default\\I18n\\it_IT.php'), 'it_IT', 'pdf.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\pdf\\default\\I18n\\pt_PT.php'), 'pt_PT', 'pdf.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\pdf\\default\\I18n\\ru_RU.php'), 'ru_RU', 'pdf.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\pdf\\default\\I18n\\tr_TR.php'), 'tr_TR', 'pdf.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\email\\default\\I18n\\ar_SA.php'), 'ar_SA', 'email.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\email\\default\\I18n\\cs_CZ.php'), 'cs_CZ', 'email.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\email\\default\\I18n\\de_DE.php'), 'de_DE', 'email.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\email\\default\\I18n\\el_GR.php'), 'el_GR', 'email.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\email\\default\\I18n\\en_US.php'), 'en_US', 'email.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\email\\default\\I18n\\es_ES.php'), 'es_ES', 'email.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\email\\default\\I18n\\fr_FR.php'), 'fr_FR', 'email.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\email\\default\\I18n\\it_IT.php'), 'it_IT', 'email.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\email\\default\\I18n\\ru_RU.php'), 'ru_RU', 'email.default');
        $instance->addResource('php', ($this->targetDirs[2].'\\templates\\email\\default\\I18n\\tr_TR.php'), 'tr_TR', 'email.default');
        $instance->addLoader('php', $this->get('translation.loader.php'));
        $instance->addLoader('yml', $a);
        $instance->addLoader('yaml', $a);
        $instance->addLoader('xlf', $b);
        $instance->addLoader('xliff', $b);
        $instance->addLoader('po', $this->get('translation.loader.po'));
        $instance->addLoader('mo', $this->get('translation.loader.mo'));
        $instance->addLoader('ts', $this->get('translation.loader.qt'));
        $instance->addLoader('csv', $this->get('translation.loader.csv'));
        $instance->addLoader('res', $this->get('translation.loader.res'));
        $instance->addLoader('dat', $this->get('translation.loader.dat'));
        $instance->addLoader('ini', $this->get('translation.loader.ini'));

        return $instance;
    }

    /**
     * Gets the 'thelia.url.manager' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Tools\URL A Thelia\Tools\URL instance.
     */
    protected function getThelia_Url_ManagerService()
    {
        return $this->services['thelia.url.manager'] = new \Thelia\Tools\URL($this);
    }

    /**
     * Gets the 'translation.loader.csv' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\CsvFileLoader A Symfony\Component\Translation\Loader\CsvFileLoader instance.
     */
    protected function getTranslation_Loader_CsvService()
    {
        return $this->services['translation.loader.csv'] = new \Symfony\Component\Translation\Loader\CsvFileLoader();
    }

    /**
     * Gets the 'translation.loader.dat' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\IcuResFileLoader A Symfony\Component\Translation\Loader\IcuResFileLoader instance.
     */
    protected function getTranslation_Loader_DatService()
    {
        return $this->services['translation.loader.dat'] = new \Symfony\Component\Translation\Loader\IcuResFileLoader();
    }

    /**
     * Gets the 'translation.loader.ini' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\IniFileLoader A Symfony\Component\Translation\Loader\IniFileLoader instance.
     */
    protected function getTranslation_Loader_IniService()
    {
        return $this->services['translation.loader.ini'] = new \Symfony\Component\Translation\Loader\IniFileLoader();
    }

    /**
     * Gets the 'translation.loader.mo' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\MoFileLoader A Symfony\Component\Translation\Loader\MoFileLoader instance.
     */
    protected function getTranslation_Loader_MoService()
    {
        return $this->services['translation.loader.mo'] = new \Symfony\Component\Translation\Loader\MoFileLoader();
    }

    /**
     * Gets the 'translation.loader.php' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\PhpFileLoader A Symfony\Component\Translation\Loader\PhpFileLoader instance.
     */
    protected function getTranslation_Loader_PhpService()
    {
        return $this->services['translation.loader.php'] = new \Symfony\Component\Translation\Loader\PhpFileLoader();
    }

    /**
     * Gets the 'translation.loader.po' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\PoFileLoader A Symfony\Component\Translation\Loader\PoFileLoader instance.
     */
    protected function getTranslation_Loader_PoService()
    {
        return $this->services['translation.loader.po'] = new \Symfony\Component\Translation\Loader\PoFileLoader();
    }

    /**
     * Gets the 'translation.loader.qt' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\QtFileLoader A Symfony\Component\Translation\Loader\QtFileLoader instance.
     */
    protected function getTranslation_Loader_QtService()
    {
        return $this->services['translation.loader.qt'] = new \Symfony\Component\Translation\Loader\QtFileLoader();
    }

    /**
     * Gets the 'translation.loader.res' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\IcuResFileLoader A Symfony\Component\Translation\Loader\IcuResFileLoader instance.
     */
    protected function getTranslation_Loader_ResService()
    {
        return $this->services['translation.loader.res'] = new \Symfony\Component\Translation\Loader\IcuResFileLoader();
    }

    /**
     * Gets the 'translation.loader.xliff' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\XliffFileLoader A Symfony\Component\Translation\Loader\XliffFileLoader instance.
     */
    protected function getTranslation_Loader_XliffService()
    {
        return $this->services['translation.loader.xliff'] = new \Symfony\Component\Translation\Loader\XliffFileLoader();
    }

    /**
     * Gets the 'translation.loader.yml' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Symfony\Component\Translation\Loader\YamlFileLoader A Symfony\Component\Translation\Loader\YamlFileLoader instance.
     */
    protected function getTranslation_Loader_YmlService()
    {
        return $this->services['translation.loader.yml'] = new \Symfony\Component\Translation\Loader\YamlFileLoader();
    }

    /**
     * Gets the 'validators.translator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Thelia\Core\EventListener\RequestListener A Thelia\Core\EventListener\RequestListener instance.
     */
    protected function getValidators_TranslatorService()
    {
        return $this->services['validators.translator'] = new \Thelia\Core\EventListener\RequestListener($this->get('thelia.translator'));
    }

    /**
     * Gets the 'virtualproductcontrol.hook' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \VirtualProductControl\Hook\VirtualProductHook A VirtualProductControl\Hook\VirtualProductHook instance.
     * 
     * @throws InactiveScopeException when the 'virtualproductcontrol.hook' service is requested while the 'request' scope is not active
     */
    protected function getVirtualproductcontrol_HookService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('virtualproductcontrol.hook', 'request');
        }

        $this->services['virtualproductcontrol.hook'] = $this->scopedServices['request']['virtualproductcontrol.hook'] = $instance = new \VirtualProductControl\Hook\VirtualProductHook($this->get('thelia.securitycontext'));

        $instance->module = $this->get('module.virtualproductcontrol');
        $instance->parser = $this->get('thelia.parser');
        $instance->translator = $this->get('thelia.translator');
        $instance->assetsResolver = $this->get('thelia.parser.asset.resolver');
        $instance->dispatcher = $this->get('event_dispatcher');

        return $instance;
    }

    /**
     * {@inheritdoc}
     */
    public function getParameter($name)
    {
        $name = strtolower($name);

        if (!(isset($this->parameters[$name]) || array_key_exists($name, $this->parameters))) {
            throw new InvalidArgumentException(sprintf('The parameter "%s" must be defined.', $name));
        }

        return $this->parameters[$name];
    }

    /**
     * {@inheritdoc}
     */
    public function hasParameter($name)
    {
        $name = strtolower($name);

        return isset($this->parameters[$name]) || array_key_exists($name, $this->parameters);
    }

    /**
     * {@inheritdoc}
     */
    public function setParameter($name, $value)
    {
        throw new LogicException('Impossible to call set() on a frozen ParameterBag.');
    }

    /**
     * {@inheritdoc}
     */
    public function getParameterBag()
    {
        if (null === $this->parameterBag) {
            $this->parameterBag = new FrozenParameterBag($this->parameters);
        }

        return $this->parameterBag;
    }
    /**
     * Gets the default parameters.
     *
     * @return array An array of the default parameters
     */
    protected function getDefaultParameters()
    {
        return array(
            'kernel.root_dir' => ($this->targetDirs[2].'\\core\\lib\\Thelia\\Core'),
            'kernel.environment' => 'dev',
            'kernel.debug' => true,
            'kernel.name' => 'Core',
            'kernel.cache_dir' => __DIR__,
            'kernel.logs_dir' => ($this->targetDirs[2].'\\log'),
            'kernel.bundles' => array(
                'TheliaBundle' => 'Thelia\\Core\\Bundle\\TheliaBundle',
            ),
            'kernel.charset' => 'UTF-8',
            'kernel.container_class' => 'CoreDevDebugProjectContainer',
            'thelia.root_dir' => ($this->targetDirs[2].'\\'),
            'thelia.core_dir' => ($this->targetDirs[2].'\\core\\lib\\Thelia'),
            'thelia.module_dir' => ($this->targetDirs[2].'\\local\\modules\\'),
            'thelia.parser.loops' => array(
                'accessory' => 'Thelia\\Core\\Template\\Loop\\Accessory',
                'address' => 'Thelia\\Core\\Template\\Loop\\Address',
                'admin' => 'Thelia\\Core\\Template\\Loop\\Admin',
                'area' => 'Thelia\\Core\\Template\\Loop\\Area',
                'associated_content' => 'Thelia\\Core\\Template\\Loop\\AssociatedContent',
                'attribute' => 'Thelia\\Core\\Template\\Loop\\Attribute',
                'attribute_availability' => 'Thelia\\Core\\Template\\Loop\\AttributeAvailability',
                'attribute_combination' => 'Thelia\\Core\\Template\\Loop\\AttributeCombination',
                'auth' => 'Thelia\\Core\\Template\\Loop\\Auth',
                'brand' => 'Thelia\\Core\\Template\\Loop\\Brand',
                'category' => 'Thelia\\Core\\Template\\Loop\\Category',
                'content' => 'Thelia\\Core\\Template\\Loop\\Content',
                'country' => 'Thelia\\Core\\Template\\Loop\\Country',
                'currency' => 'Thelia\\Core\\Template\\Loop\\Currency',
                'customer' => 'Thelia\\Core\\Template\\Loop\\Customer',
                'feature' => 'Thelia\\Core\\Template\\Loop\\Feature',
                'feature-availability' => 'Thelia\\Core\\Template\\Loop\\FeatureAvailability',
                'feature_value' => 'Thelia\\Core\\Template\\Loop\\FeatureValue',
                'folder' => 'Thelia\\Core\\Template\\Loop\\Folder',
                'folder-path' => 'Thelia\\Core\\Template\\Loop\\FolderPath',
                'module' => 'Thelia\\Core\\Template\\Loop\\Module',
                'hook' => 'Thelia\\Core\\Template\\Loop\\Hook',
                'module_hook' => 'Thelia\\Core\\Template\\Loop\\ModuleHook',
                'order' => 'Thelia\\Core\\Template\\Loop\\Order',
                'order_address' => 'Thelia\\Core\\Template\\Loop\\OrderAddress',
                'order_product' => 'Thelia\\Core\\Template\\Loop\\OrderProduct',
                'order_product_tax' => 'Thelia\\Core\\Template\\Loop\\OrderProductTax',
                'order_coupon' => 'Thelia\\Core\\Template\\Loop\\OrderCoupon',
                'order_product_attribute_combination' => 'Thelia\\Core\\Template\\Loop\\OrderProductAttributeCombination',
                'order-status' => 'Thelia\\Core\\Template\\Loop\\OrderStatus',
                'category-path' => 'Thelia\\Core\\Template\\Loop\\CategoryPath',
                'payment' => 'Thelia\\Core\\Template\\Loop\\Payment',
                'product' => 'Thelia\\Core\\Template\\Loop\\Product',
                'product_sale_elements' => 'Thelia\\Core\\Template\\Loop\\ProductSaleElements',
                'profile' => 'Thelia\\Core\\Template\\Loop\\Profile',
                'resource' => 'Thelia\\Core\\Template\\Loop\\Resource',
                'feed' => 'Thelia\\Core\\Template\\Loop\\Feed',
                'title' => 'Thelia\\Core\\Template\\Loop\\Title',
                'lang' => 'Thelia\\Core\\Template\\Loop\\Lang',
                'category-tree' => 'Thelia\\Core\\Template\\Loop\\CategoryTree',
                'folder-tree' => 'Thelia\\Core\\Template\\Loop\\FolderTree',
                'cart' => 'Thelia\\Core\\Template\\Loop\\Cart',
                'image' => 'Thelia\\Core\\Template\\Loop\\Image',
                'document' => 'Thelia\\Core\\Template\\Loop\\Document',
                'config' => 'Thelia\\Core\\Template\\Loop\\Config',
                'coupon' => 'Thelia\\Core\\Template\\Loop\\Coupon',
                'message' => 'Thelia\\Core\\Template\\Loop\\Message',
                'delivery' => 'Thelia\\Core\\Template\\Loop\\Delivery',
                'product-template' => 'Thelia\\Core\\Template\\Loop\\ProductTemplate',
                'template' => 'Thelia\\Core\\Template\\Loop\\Template',
                'tax' => 'Thelia\\Core\\Template\\Loop\\Tax',
                'tax-rule' => 'Thelia\\Core\\Template\\Loop\\TaxRule',
                'tax-rule-country' => 'Thelia\\Core\\Template\\Loop\\TaxRuleCountry',
                'formatter' => 'Thelia\\Core\\Template\\Loop\\Formatter',
                'archive-builder' => 'Thelia\\Core\\Template\\Loop\\ArchiveBuilder',
                'import-category' => 'Thelia\\Core\\Template\\Loop\\ImportCategory',
                'export-category' => 'Thelia\\Core\\Template\\Loop\\ExportCategory',
                'import' => 'Thelia\\Core\\Template\\Loop\\Import',
                'export' => 'Thelia\\Core\\Template\\Loop\\Export',
                'sale' => 'Thelia\\Core\\Template\\Loop\\Sale',
                'module-config' => 'Thelia\\Core\\Template\\Loop\\ModuleConfig',
                'product-sale-elements-document' => 'Thelia\\Core\\Template\\Loop\\ProductSaleElementsDocument',
                'product-sale-elements-image' => 'Thelia\\Core\\Template\\Loop\\ProductSaleElementsImage',
                'carousel' => 'Carousel\\Loop\\CarouselLoop',
                'product_heizung' => 'HookKonfigurator\\Loop\\ProductHeizung',
            ),
            'thelia.parser.filters' => array(

            ),
            'thelia.parser.templatedirectives' => array(

            ),
            'command.definition' => array(
                0 => 'Thelia\\Command\\ClearImageCache',
                1 => 'Thelia\\Command\\CacheClear',
                2 => 'Thelia\\Command\\Install',
                3 => 'Thelia\\Command\\ModuleGenerateCommand',
                4 => 'Thelia\\Command\\ModuleGenerateModelCommand',
                5 => 'Thelia\\Command\\ModuleGenerateSqlCommand',
                6 => 'Thelia\\Command\\ModuleRefreshCommand',
                7 => 'Thelia\\Command\\ModuleActivateCommand',
                8 => 'Thelia\\Command\\ModuleDeactivateCommand',
                9 => 'Thelia\\Command\\ModuleListCommand',
                10 => 'Thelia\\Command\\ModulePositionCommand',
                11 => 'Thelia\\Command\\CreateAdminUser',
                12 => 'Thelia\\Command\\ReloadDatabaseCommand',
                13 => 'Thelia\\Command\\GenerateResources',
                14 => 'Thelia\\Command\\AdminUpdatePasswordCommand',
                15 => 'Thelia\\Command\\ConfigCommand',
                16 => 'Thelia\\Command\\SaleCheckActivationCommand',
                17 => 'Thelia\\Command\\GenerateSQLCommand',
            ),
            'thelia.parser.forms' => array(
                'thelia.api.empty' => 'Thelia\\Form\\Api\\ApiEmptyForm',
                'thelia.api.customer.create' => 'Thelia\\Form\\Api\\Customer\\CustomerCreateForm',
                'thelia.api.customer.update' => 'Thelia\\Form\\Api\\Customer\\CustomerUpdateForm',
                'thelia.api.customer.login' => 'Thelia\\Form\\Api\\Customer\\CustomerLogin',
                'thelia.api.category.create' => 'Thelia\\Form\\Api\\Category\\CategoryCreationForm',
                'thelia.api.category.update' => 'Thelia\\Form\\Api\\Category\\CategoryModificationForm',
                'thelia.api.product_sale_elements' => 'Thelia\\Form\\Api\\ProductSaleElements\\ProductSaleElementsForm',
                'thelia.api.product.creation' => 'Thelia\\Form\\Api\\Product\\ProductCreationForm',
                'thelia.api.product.modification' => 'Thelia\\Form\\Api\\Product\\ProductModificationForm',
                'thelia.front.customer.login' => 'Thelia\\Form\\CustomerLogin',
                'thelia.front.customer.lostpassword' => 'Thelia\\Form\\CustomerLostPasswordForm',
                'thelia.front.customer.create' => 'Thelia\\Form\\CustomerCreateForm',
                'thelia.front.customer.profile.update' => 'Thelia\\Form\\CustomerProfileUpdateForm',
                'thelia.front.customer.password.update' => 'Thelia\\Form\\CustomerPasswordUpdateForm',
                'thelia.front.address.create' => 'Thelia\\Form\\AddressCreateForm',
                'thelia.front.address.update' => 'Thelia\\Form\\AddressUpdateForm',
                'thelia.front.contact' => 'Thelia\\Form\\ContactForm',
                'thelia.front.newsletter' => 'Thelia\\Form\\NewsletterForm',
                'thelia.admin.login' => 'Thelia\\Form\\AdminLogin',
                'thelia.admin.seo' => 'Thelia\\Form\\SeoForm',
                'thelia.admin.customer.create' => 'Thelia\\Form\\CustomerCreateForm',
                'thelia.admin.customer.update' => 'Thelia\\Form\\CustomerUpdateForm',
                'thelia.admin.address.create' => 'Thelia\\Form\\AddressCreateForm',
                'thelia.admin.address.update' => 'Thelia\\Form\\AddressUpdateForm',
                'thelia.admin.category.creation' => 'Thelia\\Form\\CategoryCreationForm',
                'thelia.admin.category.modification' => 'Thelia\\Form\\CategoryModificationForm',
                'thelia.admin.category.image.modification' => 'Thelia\\Form\\CategoryImageModification',
                'thelia.admin.category.document.modification' => 'Thelia\\Form\\CategoryDocumentModification',
                'thelia.admin.product.creation' => 'Thelia\\Form\\ProductCreationForm',
                'thelia.admin.product.clone' => 'Thelia\\Form\\ProductCloneForm',
                'thelia.admin.product.modification' => 'Thelia\\Form\\ProductModificationForm',
                'thelia.admin.product.details.modification' => 'Thelia\\Form\\ProductDetailsModificationForm',
                'thelia.admin.product.image.modification' => 'Thelia\\Form\\ProductImageModification',
                'thelia.admin.product.document.modification' => 'Thelia\\Form\\ProductDocumentModification',
                'thelia.admin.product_sale_element.update' => 'Thelia\\Form\\ProductSaleElementUpdateForm',
                'thelia.admin.product_default_sale_element.update' => 'Thelia\\Form\\ProductDefaultSaleElementUpdateForm',
                'thelia.admin.product_combination.build' => 'Thelia\\Form\\ProductCombinationGenerationForm',
                'thelia.admin.product.deletion' => 'Thelia\\Form\\ProductModificationForm',
                'thelia.admin.folder.creation' => 'Thelia\\Form\\FolderCreationForm',
                'thelia.admin.folder.modification' => 'Thelia\\Form\\FolderModificationForm',
                'thelia.admin.folder.image.modification' => 'Thelia\\Form\\FolderImageModification',
                'thelia.admin.folder.document.modification' => 'Thelia\\Form\\FolderDocumentModification',
                'thelia.admin.content.creation' => 'Thelia\\Form\\ContentCreationForm',
                'thelia.admin.content.modification' => 'Thelia\\Form\\ContentModificationForm',
                'thelia.admin.content.image.modification' => 'Thelia\\Form\\ContentImageModification',
                'thelia.admin.content.document.modification' => 'Thelia\\Form\\ContentDocumentModification',
                'thelia.admin.brand.creation' => 'Thelia\\Form\\Brand\\BrandCreationForm',
                'thelia.admin.brand.modification' => 'Thelia\\Form\\Brand\\BrandModificationForm',
                'thelia.admin.brand.image.modification' => 'Thelia\\Form\\Brand\\BrandImageModification',
                'thelia.admin.brand.document.modification' => 'Thelia\\Form\\Brand\\BrandDocumentModification',
                'thelia.cart.add' => 'Thelia\\Form\\CartAdd',
                'thelia.order.delivery' => 'Thelia\\Form\\OrderDelivery',
                'thelia.order.payment' => 'Thelia\\Form\\OrderPayment',
                'thelia.order.update.address' => 'Thelia\\Form\\OrderUpdateAddress',
                'thelia.order.coupon' => 'Thelia\\Form\\CouponCode',
                'thelia.admin.config.creation' => 'Thelia\\Form\\ConfigCreationForm',
                'thelia.admin.config.modification' => 'Thelia\\Form\\ConfigModificationForm',
                'thelia.admin.message.creation' => 'Thelia\\Form\\MessageCreationForm',
                'thelia.admin.message.modification' => 'Thelia\\Form\\MessageModificationForm',
                'thelia.admin.currency.creation' => 'Thelia\\Form\\CurrencyCreationForm',
                'thelia.admin.currency.modification' => 'Thelia\\Form\\CurrencyModificationForm',
                'thelia.admin.coupon.creation' => 'Thelia\\Form\\CouponCreationForm',
                'thelia.admin.attribute.creation' => 'Thelia\\Form\\AttributeCreationForm',
                'thelia.admin.attribute.modification' => 'Thelia\\Form\\AttributeModificationForm',
                'thelia.admin.feature.creation' => 'Thelia\\Form\\FeatureCreationForm',
                'thelia.admin.feature.modification' => 'Thelia\\Form\\FeatureModificationForm',
                'thelia.admin.attributeav.creation' => 'Thelia\\Form\\AttributeAvCreationForm',
                'thelia.admin.attributeav.modification' => 'Thelia\\Form\\AttributeAvCreationForm',
                'thelia.admin.featureav.creation' => 'Thelia\\Form\\FeatureAvCreationForm',
                'thelia.admin.taxrule.modification' => 'Thelia\\Form\\TaxRuleModificationForm',
                'thelia.admin.taxrule.taxlistupdate' => 'Thelia\\Form\\TaxRuleTaxListUpdateForm',
                'thelia.admin.taxrule.add' => 'Thelia\\Form\\TaxRuleCreationForm',
                'thelia.admin.tax.modification' => 'Thelia\\Form\\TaxModificationForm',
                'thelia.admin.tax.taxlistupdate' => 'Thelia\\Form\\TaxTaxListUpdateForm',
                'thelia.admin.tax.add' => 'Thelia\\Form\\TaxCreationForm',
                'thelia.admin.profile.add' => 'Thelia\\Form\\ProfileCreationForm',
                'thelia.admin.profile.modification' => 'Thelia\\Form\\ProfileModificationForm',
                'thelia.admin.profile.resource-access.modification' => 'Thelia\\Form\\ProfileUpdateResourceAccessForm',
                'thelia.admin.profile.module-access.modification' => 'Thelia\\Form\\ProfileUpdateModuleAccessForm',
                'thelia.admin.administrator.add' => 'Thelia\\Form\\AdministratorCreationForm',
                'thelia.admin.administrator.update' => 'Thelia\\Form\\AdministratorModificationForm',
                'thelia.admin.mailing-system.update' => 'Thelia\\Form\\MailingSystemModificationForm',
                'thelia.admin.template.creation' => 'Thelia\\Form\\TemplateCreationForm',
                'thelia.admin.template.modification' => 'Thelia\\Form\\TemplateModificationForm',
                'thelia.admin.country.creation' => 'Thelia\\Form\\CountryCreationForm',
                'thelia.admin.country.modification' => 'Thelia\\Form\\CountryModificationForm',
                'thelia.admin.area.create' => 'Thelia\\Form\\Area\\AreaCreateForm',
                'thelia.admin.area.modification' => 'Thelia\\Form\\Area\\AreaModificationForm',
                'thelia.admin.area.country' => 'Thelia\\Form\\Area\\AreaCountryForm',
                'thelia.admin.area.delete.country' => 'Thelia\\Form\\Area\\AreaDeleteCountryForm',
                'thelia.admin.area.postage' => 'Thelia\\Form\\Area\\AreaPostageForm',
                'thelia.shopping_zone_area' => 'Thelia\\Form\\ShippingZone\\ShippingZoneAddArea',
                'thelia.shipping_zone_area' => 'Thelia\\Form\\ShippingZone\\ShippingZoneAddArea',
                'thelia.shopping_zone_remove_area' => 'Thelia\\Form\\ShippingZone\\ShippingZoneRemoveArea',
                'thelia.lang.update' => 'Thelia\\Form\\Lang\\LangUpdateForm',
                'thelia.lang.create' => 'Thelia\\Form\\Lang\\LangCreateForm',
                'thelia.lang.defaultBehavior' => 'Thelia\\Form\\Lang\\LangDefaultBehaviorForm',
                'thelia.lang.url' => 'Thelia\\Form\\Lang\\LangUrlForm',
                'thelia.configuration.store' => 'Thelia\\Form\\ConfigStoreForm',
                'thelia.system-logs.configuration' => 'Thelia\\Form\\SystemLogConfigurationForm',
                'thelia.admin.module.modification' => 'Thelia\\Form\\ModuleModificationForm',
                'thelia.admin.module.image.modification' => 'Thelia\\Form\\ModuleImageModification',
                'thelia.admin.module.install' => 'Thelia\\Form\\ModuleInstallForm',
                'thelia.admin.hook.creation' => 'Thelia\\Form\\HookCreationForm',
                'thelia.admin.hook.modification' => 'Thelia\\Form\\HookModificationForm',
                'thelia.admin.module-hook.creation' => 'Thelia\\Form\\ModuleHookCreationForm',
                'thelia.admin.module-hook.modification' => 'Thelia\\Form\\ModuleHookModificationForm',
                'thelia.cache.flush' => 'Thelia\\Form\\Cache\\CacheFlushForm',
                'thelia.assets.flush' => 'Thelia\\Form\\Cache\\AssetsFlushForm',
                'thelia.images-and-documents-cache.flush' => 'Thelia\\Form\\Cache\\ImagesAndDocumentsCacheFlushForm',
                'thelia.export' => 'Thelia\\Form\\ExportForm',
                'thelia.import' => 'Thelia\\Form\\ImportForm',
                'thelia.admin.sale.creation' => 'Thelia\\Form\\Sale\\SaleCreationForm',
                'thelia.admin.sale.modification' => 'Thelia\\Form\\Sale\\SaleModificationForm',
                'thelia.empty' => 'Thelia\\Form\\EmptyForm',
                'thelia_api_create' => 'Thelia\\Form\\Api\\ApiCreateForm',
                'thelia_api_update' => 'Thelia\\Form\\Api\\ApiUpdateForm',
                'carousel.image' => 'Carousel\\Form\\CarouselImageForm',
                'carousel.update' => 'Carousel\\Form\\CarouselUpdateForm',
                'hookanalytics.configuration.form' => 'HookAnalytics\\Form\\Configuration',
                'hooknavigation.configuration' => 'HookNavigation\\Form\\HookNavigationConfigForm',
                'hooksocial.configuration.form' => 'HookSocial\\Form\\Configuration',
                'konfigurator.heizlast.berechnung' => 'HookKonfigurator\\Form\\HeizlastBerechnung',
            ),
            'esi.class' => 'Symfony\\Component\\HttpKernel\\HttpCache\\Esi',
            'esi_listener.class' => 'Symfony\\Component\\HttpKernel\\EventListener\\EsiListener',
            'fragment.renderer.esi.class' => 'Symfony\\Component\\HttpKernel\\Fragment\\EsiFragmentRenderer',
            'fragment.renderer.inline.class' => 'Symfony\\Component\\HttpKernel\\Fragment\\InlineFragmentRenderer',
            'file_model.classes' => array(
                'document.product' => 'Thelia\\Model\\ProductDocument',
                'image.product' => 'Thelia\\Model\\ProductImage',
                'document.category' => 'Thelia\\Model\\CategoryDocument',
                'image.category' => 'Thelia\\Model\\CategoryImage',
                'document.content' => 'Thelia\\Model\\ContentDocument',
                'image.content' => 'Thelia\\Model\\ContentImage',
                'document.folder' => 'Thelia\\Model\\FolderDocument',
                'image.folder' => 'Thelia\\Model\\FolderImage',
                'document.brand' => 'Thelia\\Model\\BrandDocument',
                'image.brand' => 'Thelia\\Model\\BrandImage',
                'image.module' => 'Thelia\\Model\\ModuleImage',
            ),
            'import.base_url' => '/admin/import',
            'export.base_url' => '/admin/export',
            'thelia.token_id' => 'thelia.token_provider',
            'thelia.validator.translation_domain' => 'validators',
            'thelia.logger.class' => 'Thelia\\Log\\Tlog',
            'router.request_context.class' => 'Symfony\\Component\\Routing\\RequestContext',
            'router.null_generator.class' => 'Thelia\\Routing\\NullUrlGenerator',
            'router.dynamicrouter.class' => 'Symfony\\Cmf\\Component\\Routing\\DynamicRouter',
            'router.chainrouter.class' => 'Symfony\\Cmf\\Component\\Routing\\ChainRouter',
            'router.class' => 'Symfony\\Component\\Routing\\Router',
            'router.xmlfilename' => 'routing.xml',
            'test.client.class' => 'Thelia\\Core\\HttpKernel\\Client',
            'test.client.parameters' => array(

            ),
            'test.client.history.class' => 'Symfony\\Component\\BrowserKit\\History',
            'test.client.cookiejar.class' => 'Symfony\\Component\\BrowserKit\\CookieJar',
            'translation.loader.php.class' => 'Symfony\\Component\\Translation\\Loader\\PhpFileLoader',
            'translation.loader.yml.class' => 'Symfony\\Component\\Translation\\Loader\\YamlFileLoader',
            'translation.loader.xliff.class' => 'Symfony\\Component\\Translation\\Loader\\XliffFileLoader',
            'translation.loader.po.class' => 'Symfony\\Component\\Translation\\Loader\\PoFileLoader',
            'translation.loader.mo.class' => 'Symfony\\Component\\Translation\\Loader\\MoFileLoader',
            'translation.loader.qt.class' => 'Symfony\\Component\\Translation\\Loader\\QtFileLoader',
            'translation.loader.csv.class' => 'Symfony\\Component\\Translation\\Loader\\CsvFileLoader',
            'translation.loader.res.class' => 'Symfony\\Component\\Translation\\Loader\\IcuResFileLoader',
            'translation.loader.dat.class' => 'Symfony\\Component\\Translation\\Loader\\IcuDatFileLoader',
            'translation.loader.ini.class' => 'Symfony\\Component\\Translation\\Loader\\IniFileLoader',
        );
    }
}
