<?php

namespace Baka\Test\Integration\Database;

use PhalconUnitTestCase;
use Baka\Database\Contracts\CustomFields\CustomFieldsTasksTrait;

class CustomFieldCliTest extends PhalconUnitTestCase
{
    use CustomFieldsTasksTrait;

    /**
     * test the creation of a custom field.
     *
     * @return void
     */
    public function testCreateModuleAction()
    {
        //drop the table

        $createTable = $this->createModuleAction([
            'leads', //name
            'Baka\Test\Support\Models\Leads', //model with namespace
            'CRM', //app
        ]);

        $this->assertTrue((bool) preg_match('/Custom Field Module Created/i', $createTable));
    }

    /**
     * Create a field for this.
     *
     * @return void
     */
    public function testCustomFieldCreationAction()
    {
        $createFields = $this->createFieldsAction([
            'reference', //field name
            'Baka\Test\Support\Models\Leads', //model
            'CRM', //app
            'text', //type
            'null', //default files
        ]);

        $this->assertTrue((bool) preg_match('/Custom field created for/i', $createFields));
    }

    /**
     * Create a field for this.
     *
     * @return void
     */
    public function testCustomFieldCreationActionWithDefaultValues()
    {
        $createFields = $this->createFieldsAction([
            'reference', //field name
            'Baka\Test\Support\Models\Leads', //model
            'CRM', //app
            'text', //type
            'label1:value1|label2:value2', //default files
        ]);

        $this->assertTrue((bool) preg_match('/Custom field created for/i', $createFields));
    }
}
