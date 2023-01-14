# Git Bisect Demo

This project leverages `git bisect` and PHPUnit to quickly identify the first broken commit in a project change history. 

The initial commit (8550717) was created directly by GitHub upon project creation. The next commit (916161c) established a basic application with a suite of unit tests (all passing) to verify basic math functionality.

There were 5 commits after that known-good commit that were, due to user error, untested before they were committed. All we know now is that the current `HEAD` of the project is broken. Tests are still passing, but that's due to the `addAll()` function not having appropriate tests.

To figure out where exactly things broke we need to first write a test to fully exercise the logical tree of `addAll()`. Its original intention was to add the absolute values of the numbers passed in but, somewhere along the way, it started respecting the negative signs on numbers. A test to validate it's casting things properly would look like the following:

```
function testAddAllNegatives(): void
{
    $this->assertSame(addAll(2, 3, 3), 8);
    $this->assertSame(addAll(2, 3, -3), 8);
}
```

Commit this test to your local copy of the repo. It will fail.

Next, use `git rebase` to reorder commits. You should place this new test immediately after the last known good commit (916161c). This will change the commit hash of the test commit and all commits after it.

We've placed the failing test after the last known good commit. It will pass there as we know the project was solid at that time. Now, use `git bisect` to test commits from this known test commit to the current `HEAD` - Git will tell you when it finds the broken commit and you can check the diff on that commit to see _exactly_ what broke.

Use `git rebase` to move our new test back to the `HEAD` of the branch and add another commit fixing the identified error. All tests should now pass as we've identified and fixed the problem!

The next step would be to add similar negative number tests for the _other_ methods that have been added since we handled addition.