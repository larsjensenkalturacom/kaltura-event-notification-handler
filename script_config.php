<?php

/*********************** SCRIPT CONFIGURATION START ***********************/

// Handler parameters. Those parameters need to be passed to the notification handler.
$handlerParams = array(
    // metadataProfileID of the custom metadata schema holding the field used to keep track of the synchronization status:
    'syncMetadataProfileId' => YOUR_METADATA_PROFILE_ID,
    /* name of the field used to keep track of the synchronization status.
       Set up a Text Select List field with at least two values, one which will mark entries as requiring sync (e.g. 'Sync Needed') and one which will mark entries as already synced (e.g. 'Sync Done'). We recommend setting an additional 'in between' value for marking entries which are ready for sync but should not be synced for now (e.g. 'Sync Manual') - Once a content manager wishes to have the entry synced, she will change to value to 'Sync Needed', which will then be picked up by the handler (see screenshot of custom metadata filed definition): */
    'syncFieldName' => 'SyncStatus',
    // value of the field defined above, which when set in an entry, will trigger synchronization:
    'syncNeededValue' => 'Sync Needed',
    // value of the field defined above which will be set by handler once sync is complete:
    'syncDoneValue' => 'Sync Done',
    // metadataProfileID of the custom metadata schema which holds the actual content to be synced. In most cases will hold same value as syncMetadataProfileId
    'contentMetadataProfileId' => YOUR_METADATA_PROFILE_ID,

    // Add more below if needed
    // Field Name for Owner Type Definition
    'contentFieldName' => 'ContentOwnerType',
    'contentStudentValue' => 'Student',
    'contentFacultyValue' => 'Faculty',
    'contentOtherValue' => 'Other',
    //one or more characters, @student, one or more characters
    'regexStudent' => '/.+?@student.+?/',
    'regexFaculty' => '/.+?@university.+?/',

);

/************************ SCRIPT CONFIGURATION END ************************/