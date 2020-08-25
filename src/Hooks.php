<?php

namespace Lupcom\Globals;

/**
 * Class Hooks
 * @copyright LUPCOM media GmbH
 * @author Christian Wederka <christian.wederka@lupcom.de>
 * @package Lupcom\Globals
 */
class Hooks
{
    /**
     * @var
     */
    private $hooks;

    /**
     * @var
     */
    private static $instance;

    /**
     * Hooks constructor.
     */
    public function __construct()
    {

    }

    /**
     * @return $this
     */
    public static function get()
    {
        self::$instance = new self;
        self::$instance->hooks = &$GLOBALS['TL_HOOKS'];

        return self::$instance;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function activateAccount(array $callback): Hooks
    {
        $this->hooks['activateAccount'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function activateRecipient(array $callback): Hooks
    {
        $this->hooks['activateRecipient'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function addComment(array $callback): Hooks
    {
        $this->hooks['addComment'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function addCustomRegexp(array $callback): Hooks
    {
        $this->hooks['addCustomRegexp'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function addLogEntry(array $callback): Hooks
    {
        $this->hooks['addLogEntry'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function checkCredentials(array $callback): Hooks
    {
        $this->hooks['checkCredentials'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function closeAccount(array $callback): Hooks
    {
        $this->hooks['closeAccount'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function colorizeLogEntries(array $callback): Hooks
    {
        $this->hooks['colorizeLogEntries'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function compareThemeFiles(array $callback): Hooks
    {
        $this->hooks['compareThemeFiles'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function compileArticle(array $callback): Hooks
    {
        $this->hooks['compileArticle'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function compileDefinition(array $callback): Hooks
    {
        $this->hooks['compileDefinition'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function compileFormFields(array $callback): Hooks
    {
        $this->hooks['compileFormFields'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function createDefinition(array $callback): Hooks
    {
        $this->hooks['createDefinition'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function createNewUser(array $callback): Hooks
    {
        $this->hooks['createNewUser'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function customizeSearch(array $callback): Hooks
    {
        $this->hooks['customizeSearch'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function executePostActions(array $callback): Hooks
    {
        $this->hooks['executePostActions'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function executePreActions(array $callback): Hooks
    {
        $this->hooks['executePreActions'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function executeResize(array $callback): Hooks
    {
        $this->hooks['executeResize'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function exportTheme(array $callback): Hooks
    {
        $this->hooks['exportTheme'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function extractThemeFiles(array $callback): Hooks
    {
        $this->hooks['extractThemeFiles'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function generateBreadcrumb(array $callback): Hooks
    {
        $this->hooks['generateBreadcrumb'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function generateFrontendUrl(array $callback): Hooks
    {
        $this->hooks['generateFrontendUrl'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function generatePage(array $callback): Hooks
    {
        $this->hooks['generatePage'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function generateXmlFiles(array $callback): Hooks
    {
        $this->hooks['generateXmlFiles'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function getAllEvents(array $callback): Hooks
    {
        $this->hooks['getAllEvents'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function getArticle(array $callback): Hooks
    {
        $this->hooks['getArticle'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function getArticles(array $callback): Hooks
    {
        $this->hooks['getArticles'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function getAttributesFromDca(array $callback): Hooks
    {
        $this->hooks['getAttributesFromDca'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function getCombinedFile(array $callback): Hooks
    {
        $this->hooks['getCombinedFile'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function getContentElement(array $callback): Hooks
    {
        $this->hooks['getContentElement'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function getCountries(array $callback): Hooks
    {
        $this->hooks['getCountries'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function getForm(array $callback): Hooks
    {
        $this->hooks['getForm'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function getFrontendModule(array $callback): Hooks
    {
        $this->hooks['getFrontendModule'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function getImage(array $callback): Hooks
    {
        $this->hooks['getImage'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function getLanguages(array $callback): Hooks
    {
        $this->hooks['getLanguages'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function getPageIdFromUrl(array $callback): Hooks
    {
        $this->hooks['getPageIdFromUrl'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function getPageLayout(array $callback): Hooks
    {
        $this->hooks['getPageLayout'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function getPageStatusIcon(array $callback): Hooks
    {
        $this->hooks['getPageStatusIcon'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function getRootPageFromUrl(array $callback): Hooks
    {
        $this->hooks['getRootPageFromUrl'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function getSearchablePages(array $callback): Hooks
    {
        $this->hooks['getSearchablePages'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function getSystemMessages(array $callback): Hooks
    {
        $this->hooks['getSystemMessages'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function getUserNavigation(array $callback): Hooks
    {
        $this->hooks['getUserNavigation'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function importUser(array $callback): Hooks
    {
        $this->hooks['importUser'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function indexPage(array $callback): Hooks
    {
        $this->hooks['indexPage'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function initializeSystem(array $callback): Hooks
    {
        $this->hooks['initializeSystem'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function insertTagFlags(array $callback): Hooks
    {
        $this->hooks['insertTagFlags'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function isAllowedToEditComment(array $callback): Hooks
    {
        $this->hooks['isAllowedToEditComment'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function isVisibleElement(array $callback): Hooks
    {
        $this->hooks['isVisibleElement'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function listComments(array $callback): Hooks
    {
        $this->hooks['listComments'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function loadDataContainer(array $callback): Hooks
    {
        $this->hooks['loadDataContainer'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function loadFormField(array $callback): Hooks
    {
        $this->hooks['loadFormField'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function loadLanguageFile(array $callback): Hooks
    {
        $this->hooks['loadLanguageFile'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function loadPageDetails(array $callback): Hooks
    {
        $this->hooks['loadPageDetails'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function modifyFrontendPage(array $callback): Hooks
    {
        $this->hooks['modifyFrontendPage'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function newsListCountItems(array $callback): Hooks
    {
        $this->hooks['newsListCountItems'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function newsListFetchItems(array $callback): Hooks
    {
        $this->hooks['newsListFetchItems'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function outputBackendTemplate(array $callback): Hooks
    {
        $this->hooks['outputBackendTemplate'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function outputFrontendTemplate(array $callback): Hooks
    {
        $this->hooks['outputFrontendTemplate'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function parseArticles(array $callback): Hooks
    {
        $this->hooks['parseArticles'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function parseBackendTemplate(array $callback): Hooks
    {
        $this->hooks['parseBackendTemplate'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function parseDate(array $callback): Hooks
    {
        $this->hooks['parseDate'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function parseFrontendTemplate(array $callback): Hooks
    {
        $this->hooks['parseFrontendTemplate'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function parseTemplate(array $callback): Hooks
    {
        $this->hooks['parseTemplate'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function parseWidget(array $callback): Hooks
    {
        $this->hooks['parseWidget'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function postAuthenticate(array $callback): Hooks
    {
        $this->hooks['postAuthenticate'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function postDownload(array $callback): Hooks
    {
        $this->hooks['postDownload'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function postLogin(array $callback): Hooks
    {
        $this->hooks['postLogin'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function postLogout(array $callback): Hooks
    {
        $this->hooks['postLogout'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function postUpload(array $callback): Hooks
    {
        $this->hooks['postUpload'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function prepareFormData(array $callback): Hooks
    {
        $this->hooks['prepareFormData'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function printArticleAsPdf(array $callback): Hooks
    {
        $this->hooks['printArticleAsPdf'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function processFormData(array $callback): Hooks
    {
        $this->hooks['processFormData'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function removeOldFeeds(array $callback): Hooks
    {
        $this->hooks['removeOldFeeds'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function removeRecipient(array $callback): Hooks
    {
        $this->hooks['removeRecipient'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function replaceDynamicScriptTags(array $callback): Hooks
    {
        $this->hooks['replaceDynamicScriptTags'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function replaceInsertTags(array $callback): Hooks
    {
        $this->hooks['replaceInsertTags'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function reviseTable(array $callback): Hooks
    {
        $this->hooks['reviseTable'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function sendNewsletter(array $callback): Hooks
    {
        $this->hooks['sendNewsletter'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function setCookie(array $callback): Hooks
    {
        $this->hooks['setCookie'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function setNewPassword(array $callback): Hooks
    {
        $this->hooks['setNewPassword'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function sqlCompileCommands(array $callback): Hooks
    {
        $this->hooks['sqlCompileCommands'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function sqlGetFromDB(array $callback): Hooks
    {
        $this->hooks['sqlGetFromDB'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function sqlGetFromDca(array $callback): Hooks
    {
        $this->hooks['sqlGetFromDca'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function sqlGetFromFile(array $callback): Hooks
    {
        $this->hooks['sqlGetFromFile'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function storeFormData(array $callback): Hooks
    {
        $this->hooks['storeFormData'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function updatePersonalData(array $callback): Hooks
    {
        $this->hooks['updatePersonalData'][] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function validateFormField(array $callback): Hooks
    {
        $this->hooks['validateFormField'][] = $callback;

        return $this;
    }
}