<?php

class Waindigo_Tabs_Listener_FileHealthCheck
{

    public static function fileHealthCheck(XenForo_ControllerAdmin_Abstract $controller, array &$hashes)
    {
        $hashes = array_merge($hashes,
            array(
                'library/Waindigo/Tabs/ControllerAdmin/TabName.php' => 'efe8260c32b73fab8cc4842baa105cf6',
                'library/Waindigo/Tabs/ControllerAdmin/TabRule.php' => 'ae985c23ca81aa3a67a06b2848425ad2',
                'library/Waindigo/Tabs/ControllerPublic/Tab.php' => 'b5bb9cfe25627c63ef3754f8b7a8a385',
                'library/Waindigo/Tabs/DataWriter/TabName.php' => 'dcdb0e8c42dc44e5e27c444b9f7324a0',
                'library/Waindigo/Tabs/DataWriter/TabRule.php' => 'a02eb29c4152c4768b44dffc297a6b9d',
                'library/Waindigo/Tabs/Extend/Waindigo/FreeAgent/ControllerPublic/Project.php' => '2499c06ccca7f607109b486495ce4967',
                'library/Waindigo/Tabs/Extend/Waindigo/FreeAgent/ViewPublic/Project/View.php' => 'd3f635b51a2732042b4ae137deddd111',
                'library/Waindigo/Tabs/Extend/XenForo/ControllerPublic/Conversation.php' => '075e003a969423198064ff7b2671b387',
                'library/Waindigo/Tabs/Extend/XenForo/ControllerPublic/Forum.php' => 'd6a6b9124be694272be8b883ecba3c4f',
                'library/Waindigo/Tabs/Extend/XenForo/ControllerPublic/Thread.php' => 'e1f63fb57b6640d8b398d80319f156ac',
                'library/Waindigo/Tabs/Extend/XenForo/DataWriter/AddOn.php' => '42beae8d8764f9a4df0f060a1f760bf6',
                'library/Waindigo/Tabs/Extend/XenForo/DataWriter/ConversationMaster.php' => '57de9fb2d393de4a35ff839c97f3e767',
                'library/Waindigo/Tabs/Extend/XenForo/DataWriter/Discussion/Thread.php' => '6c506e8b51853700cb1a59bfa6de21ec',
                'library/Waindigo/Tabs/Extend/XenForo/ViewPublic/Conversation/Add.php' => '276dfe81a689ddcfa5a9f20c82b576ab',
                'library/Waindigo/Tabs/Extend/XenForo/ViewPublic/Conversation/View.php' => 'f99973546d00c996a7824c33ac069e13',
                'library/Waindigo/Tabs/Extend/XenForo/ViewPublic/Thread/Create.php' => '31484a12a7c9306422ccc730e5acb9ae',
                'library/Waindigo/Tabs/Extend/XenForo/ViewPublic/Thread/View.php' => '7265984520c61d9b986cc90a0740bc94',
                'library/Waindigo/Tabs/Extend/XenGallery/ControllerPublic/Media.php' => '48fcda557ea23285162c00d477c00c3b',
                'library/Waindigo/Tabs/Extend/XenGallery/DataWriter/Media.php' => '849d1d19ac0b6acb517675d2e76b612d',
                'library/Waindigo/Tabs/Extend/XenGallery/ViewPublic/Media/Add.php' => 'fbce0d973a6c41c857804c92a41dcf25',
                'library/Waindigo/Tabs/Extend/XenGallery/ViewPublic/Media/View.php' => '2fc90c40bdf900e1a4a348925fdca0a8',
                'library/Waindigo/Tabs/Extend/XenProduct/ControllerPublic/Product.php' => '1742d17d5b59fd294243d000c143e888',
                'library/Waindigo/Tabs/Extend/XenProduct/DataWriter/Product.php' => 'f4445ef58c73fd64188d09221e682059',
                'library/Waindigo/Tabs/Extend/XenProduct/ViewPublic/Product/View.php' => '1862666dc63ba5c742424da0434454c5',
                'library/Waindigo/Tabs/Extend/XenResource/ControllerPublic/Resource.php' => 'd8bf98e9bff53d7cdcfe44ce858429d9',
                'library/Waindigo/Tabs/Extend/XenResource/DataWriter/Resource.php' => 'deeb0d9c2f3b901f3e99e43481bad536',
                'library/Waindigo/Tabs/Extend/XenResource/ViewPublic/Resource/Add.php' => '196833628731dffa7f0987b7ba1eb7f2',
                'library/Waindigo/Tabs/Extend/XenResource/ViewPublic/Resource/View.php' => '302d501c8e23f379b322c451b628a0ed',
                'library/Waindigo/Tabs/Helper/Criteria.php' => 'f97296030c9b2b52bb7860747a133c3c',
                'library/Waindigo/Tabs/Install/Controller.php' => '392fc2e715d26b73426d0173c2a317e0',
                'library/Waindigo/Tabs/Listener/LoadClass.php' => 'a412ece743886c9f11b82d977e2064bd',
                'library/Waindigo/Tabs/Listener/TemplateHook.php' => 'da8f6a20f90d6d18e1bdb1f1cde986ba',
                'library/Waindigo/Tabs/Listener/TemplateModification.php' => '6056ac0fb8b8ec7cd7a935c3d33534f8',
                'library/Waindigo/Tabs/Listener/TemplatePostRender.php' => 'dd69b32deb87131295473e9908336652',
                'library/Waindigo/Tabs/Model/Tab.php' => '39b2913d3cdc0ffaa5e759e3d0dac97c',
                'library/Waindigo/Tabs/Model/TabName.php' => '21e9e3ea9ca6d49b8cf9c5050640ab45',
                'library/Waindigo/Tabs/Model/TabRule.php' => 'a6e1c9a68c7002c5be199480ada9a9ac',
                'library/Waindigo/Tabs/Option/TabNames.php' => '1b7f56599ae95c92fe5eabda0430970e',
                'library/Waindigo/Tabs/Route/Prefix/Tabs.php' => '70867a8056757aca35d6eed79df70ce3',
                'library/Waindigo/Tabs/Route/PrefixAdmin/TabNames.php' => 'ef4db7c790a106a3a159b5d21de0af0b',
                'library/Waindigo/Tabs/Route/PrefixAdmin/TabRules.php' => '4a78eb3ce6114d52410c55d507684fb0',
                'library/Waindigo/Tabs/TabHandler/Abstract.php' => 'f36793b947dcf9117f974cd422354a31',
                'library/Waindigo/Tabs/TabHandler/Conversation.php' => '6c0d5ded1cdd6f24afff0585a4de4384',
                'library/Waindigo/Tabs/TabHandler/FreeAgentProject.php' => '46e6a6716287b68b9cebbb4b64db099e',
                'library/Waindigo/Tabs/TabHandler/Resource.php' => 'f72bb8535643b81ba1fba9720521594b',
                'library/Waindigo/Tabs/TabHandler/Thread.php' => 'd6317edb0a036a51b3c3b276dfdfcead',
                'library/Waindigo/Tabs/TabHandler/XenGalleryMedia.php' => '7b55d20b5786a8fb9ce804627d5897c9',
                'library/Waindigo/Tabs/TabHandler/XenProduct.php' => 'f852fe2646a5d9cfcfee0272d4a9e036',
                'library/Waindigo/Tabs/ViewPublic/Conversation/SelectExisting/Conversation.php' => 'a49411457ebae4b387a1a69aa70475c6',
                'library/Waindigo/Tabs/ViewPublic/Helper/Tabs.php' => '21d74a8db3f5fb543481552354859062',
                'library/Waindigo/Tabs/ViewPublic/Media/SelectExisting/Category.php' => '08a4286a977abb433b45e514b5d5211a',
                'library/Waindigo/Tabs/ViewPublic/Media/SelectExisting/Media.php' => '3e940830f8465255f2815ff79c0f0abb',
                'library/Waindigo/Tabs/ViewPublic/Product/SelectExisting/Product.php' => 'ee176c8aa50fd7de4f6bc5e60001c4b4',
                'library/Waindigo/Tabs/ViewPublic/Project/SelectExisting/Project.php' => '579978cb3557fab0c4d95a375326a1c3',
                'library/Waindigo/Tabs/ViewPublic/Resource/SelectExisting/Category.php' => 'f0f2fb70094e19835f9e36d030665754',
                'library/Waindigo/Tabs/ViewPublic/Resource/SelectExisting/Resource.php' => 'c8cc9f407cf0b982ecf0e6b4227a8d16',
                'library/Waindigo/Tabs/ViewPublic/Thread/SelectExisting/Forum.php' => '6ad5fc54005da736edbb191599c6e1d5',
                'library/Waindigo/Tabs/ViewPublic/Thread/SelectExisting/Thread.php' => 'd76de7246507bd2346e8e0b1d08ee078',
                'library/Waindigo/Install.php' => '00d8b93ea3458f18752c348a09a16c50',
                'library/Waindigo/Install/20150101.php' => '57a34ae9288bb314c0d357e8c0aa3fe0',
                'library/Waindigo/Deferred.php' => '4649953c0a44928b5e2d4a86e7d3f48a',
                'library/Waindigo/Deferred/20130725.php' => '699fb7a47bd443d53cb14f524321175a',
                'library/Waindigo/Listener/ControllerPreDispatch.php' => 'f51aeb4ef6c4acbce629188b04cd3643',
                'library/Waindigo/Listener/ControllerPreDispatch/20141226.php' => '1fcffd0dc3050b0bcb5b6e3b16f53019',
                'library/Waindigo/Listener/InitDependencies.php' => '5b755bcc0e553351c40871f4181ce5b0',
                'library/Waindigo/Listener/InitDependencies/20150101.php' => '21c224866b2ea0b90dee32a6658fef5d',
                'library/Waindigo/Listener/LoadClass.php' => 'bfdfe90f8d484d81b05889037a4fb091',
                'library/Waindigo/Listener/LoadClass/20150101.php' => '04b2dfaf2b319a5a3deb90db0018d1cc',
                'library/Waindigo/Listener/Template.php' => 'b52cba9c298d9702b4536146d3ac4312',
                'library/Waindigo/Listener/Template/20150101.php' => '120172c186efb3f25ce2ceeb7dbc8f05',
                'library/Waindigo/Listener/TemplateHook.php' => '37c6a882bfb9d790801c94051fe3eb0d',
                'library/Waindigo/Listener/TemplateHook/20141020.php' => '7cea585f0284789f639fd08dbc1679b6',
                'library/Waindigo/Listener/TemplateModification.php' => '2cb817ff114aa8dd375185e951998109',
                'library/Waindigo/Listener/TemplateModification/20130810.php' => '8b8d1e64bb118c58b228597cb5afebd5',
                'library/Waindigo/Listener/TemplatePostRender.php' => '73d70bb432c859375b1b8c05ffd8d027',
                'library/Waindigo/Listener/TemplatePostRender/20140711.php' => '83c92589762bac3b5efa016de1b1aee3',
            ));
    } /* END fileHealthCheck */
}