<?php

/**
 * This file contains a subclass of the Zend_Search_Lucene_Analysis_Analyzer_Standard class.
 * Its purpose is to help provide a corresponding PHP implementation of the Standard analyzer for
 * the Java implementation of Lucene. This Analyzer, in conjunction with the filters also provided
 * in this standard analyzer package, provide a method for indexing documents with word Stemming,
 * lower-casing, and number handling. The lower-case and number handling is provided by the pre-
 * existing filters from Zend.
 *
 * License: see License.txt for a copy of the Zend License.
 *
 *Ref:
 * http://hudson.zones.apache.org/hudson/job/Lucene-trunk/javadoc//org/apache/lucene/analysis/standard/StandardAnalyzer.html
 *
 * @category   PHP_Analyzer_Standard
 */

 /** StandardAnalyzer_ */
 /* Depending on your circumstances, you may want to change the paths to meet your conventional / functional needs */

require_once dirname(__FILE__) . '/../Standard.php';
require_once dirname(__FILE__) . '/../../TokenFilter/EnglishStemmer.php';

class StandardAnalyzer_Analyzer_Standard_German extends StandardAnalyzer_Analyzer_Standard
{
        private $_stopWords = array(
          "and", "the", "of", "to", "einer",
          "eine", "eines", "einem", "einen", "der", "die", "das",
          "dass", "daß", "du", "er", "sie", "es", "was", "wer",
          "wie", "wir", "und", "oder", "ohne", "mit", "am", "im",
          "in", "aus", "auf", "ist", "sein", "war", "wird", "ihr",
          "ihre", "ihres", "ihnen", "ihrer", "als", "für", "von",
          "mit", "dich", "dir", "mich", "mir", "mein", "sein",
          "kein", "durch", "wegen", "wird", "sich", "bei", "beim",
          "noch", "den", "dem", "zu", "zur", "zum", "auf", "ein",
          "auch", "werden", "an", "des", "sein", "sind", "vor",
          "nicht", "sehr", "um", "unsere", "ohne", "so", "da", "nur",
          "diese", "dieser", "diesem", "dieses", "nach", "über",
          "mehr", "hat", "bis", "uns", "unser", "unserer", "unserem",
          "unsers", "euch", "euers", "euer", "eurem", "ihr", "ihres",
          "ihrer", "ihrem", "alle", "vom" ,
    );
  

    public function __construct()
    {
        $this->addFilter(new Zend_Search_Lucene_Analysis_TokenFilter_LowerCaseUtf8());
        $this->addFilter(new Zend_Search_Lucene_Analysis_TokenFilter_StopWords($this->_stopWords));
        $this->addFilter(new StandardAnalyzer_Analysis_TokenFilter_EnglishStemmer());
    }
}


?>
