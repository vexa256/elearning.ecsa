<div data-kt-menu-trigger="click" class="menu-item menu-accordion viewer_only">
    <span class="menu-link">
        <span class="menu-icon">
            <i class="fas text-light fw-bolder fa-2x me-1 fa-cog"
                aria-hidden="true"></i>
        </span>
        <span class="menu-title ms-2 fs-6">Course Setups</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">
        <?php

        MenuItem($link = '#', $label = 'Manage Institutions', $class = 'AjaxNav', $data_route = route('ManageInstitutions'));

        MenuItem($link = '#', $label = 'Manage Courses', $class = 'AjaxNav', $data_route = route('MgtCourses'));

        MenuItem($link = route('SelectCourseModule'), $label = 'Courses Modules');

        // MenuItem($link = route('ManageInstitutions'), $label = 'Manage Institutions');

        ?>


    </div>
</div>


<div data-kt-menu-trigger="click" class="menu-item menu-accordion viewer_only">
    <span class="menu-link">
        <span class="menu-icon">
            <i class="fas text-light fw-bolder fa-2x me-1 fa-book"
                aria-hidden="true"></i>
        </span>
        <span class="menu-title ms-2 fs-6">Course Materials</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">
        <?php

        MenuItem($link = route('SelectCourseNotes'), $label = '  Document  Notes');

        MenuItem($link = route('SelectCourseVideo'), $label = ' Video Notes ');

        MenuItem($link = route('SelectCoursePresentations'), $label = ' Presentation Notes');

        // MenuItem($link = '/', $label = 'Manage Modules');

        ?>


    </div>
</div>


<div data-kt-menu-trigger="click" class="menu-item menu-accordion viewer_only">
    <span class="menu-link">
        <span class="menu-icon">
            <i class="fas text-light fw-bolder fa-2x me-1 fa-clipboard"
                aria-hidden="true"></i>
        </span>
        <span class="menu-title ms-2 fs-6">Test Setups</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">
        <?php

        MenuItem($link = route('PretTestCourse'), $label = 'Pre-Tests');

        MenuItem($link = route('PostTestCourse'), $label = 'Post-Tests ');

        MenuItem($link = route('ModularTestCourse'), $label = 'Modular Tests');

        MenuItem($link = route('ExamTimerSettings'), $label = 'Test Scheduler');

        ?>


    </div>
</div>

<div data-kt-menu-trigger="click" class="menu-item menu-accordion viewer_only">
    <span class="menu-link">
        <span class="menu-icon">
            <i class="fas text-light fw-bolder fa-2x me-1 fa-university"
                aria-hidden="true"></i>
        </span>
        <span class="menu-title ms-2 fs-6">Question Banks</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">
        <?php

        MenuItem($link = route('PreExamCourse'), $label = 'Pre-Test Questions');

        MenuItem($link = route('PostExamCourse'), $label = 'Post-Test Questions');

        MenuItem($link = route('ModularTestCourse'), $label = 'Modular Test Questions');

        ?>


    </div>
</div>
