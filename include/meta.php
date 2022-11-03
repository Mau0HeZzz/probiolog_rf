<div class="none-block">
	<?
	if(CModule::IncludeModule('iblock')){	
	    $url = explode('?', $_SERVER['REQUEST_URI']);			
		$arSelect_seo = Array('ID', 'NAME','PROPERTY_H1','PROPERTY_H2','PROPERTY_H3','PROPERTY_H4','PROPERTY_H5','PROPERTY_H6','PROPERTY_TITLE','PROPERTY_DESCRIPTION');
		$arFilter_seo = Array('IBLOCK_ID'=>38, 'ACTIVE'=>'Y', 'GLOBAL_ACTIVE'=>'Y', 'NAME'=>$url['0']);
		$row_seo = CIBlockElement::GetList(Array("ACTIVE_FROM"=>"DESC"), $arFilter_seo, false, Array(), $arSelect_seo);	
		$flag=0;
		while($mass_seo = $row_seo->GetNext())
		{
			$flag++;
			$TITLE_MY=$mass_seo['PROPERTY_TITLE_VALUE'];
			$DESCRIPTION_MY=$mass_seo['PROPERTY_DESCRIPTION_VALUE'];
			$h1=$mass_seo['PROPERTY_H1_VALUE'];
			$h2=$mass_seo['PROPERTY_H2_VALUE'];
			$h3=$mass_seo['PROPERTY_H3_VALUE'];
			$h4=$mass_seo['PROPERTY_H4_VALUE'];
			$h5=$mass_seo['PROPERTY_H5_VALUE'];
			$h6=$mass_seo['PROPERTY_H6_VALUE'];
			$h6=$mass_seo['PROPERTY_H6_VALUE'];
			if ($TITLE_MY!=''){$APPLICATION->SetPageProperty('title',$TITLE_MY);}
			if ($DESCRIPTION_MY!=''){$APPLICATION->SetPageProperty("description", $DESCRIPTION_MY);}
			$APPLICATION->SetPageProperty("keywords", '');
			
			global $pageType; //  "bitrix:catalog", "advice-new",
			if($pageType != 'article'){
				if ($h1!=''){
					echo '<h1>'.$h1.'</h1>';
				}	
			}
			if ($h2!=''){echo '<h2>'.$h2.'</h2>';}
			if ($h3!=''){echo '<h3>'.$h3.'</h3>';}
			if ($h4!=''){echo '<h4>'.$h4.'</h4>';}
			if ($h5!=''){echo '<h5>'.$h5.'</h5>';}
			if ($h6!=''){echo '<h6>'.$h6.'</h6>';}
		}
	}
	?>

</div>